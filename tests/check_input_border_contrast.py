"""Check that the text input border in the compiled stylesheet meets WCAG 3:1
non-text contrast against the white input background (issue #21)."""
import re
import sys
from pathlib import Path

CSS = Path(__file__).resolve().parent.parent / "css" / "style.css"
MIN_RATIO = 3.0


def srgb_to_linear(c):
    c = c / 255.0
    return c / 12.92 if c <= 0.03928 else ((c + 0.055) / 1.055) ** 2.4


def luminance(hex_color):
    h = hex_color.lstrip("#")
    if len(h) == 3:
        h = "".join(ch * 2 for ch in h)
    r, g, b = (int(h[i:i + 2], 16) for i in (0, 2, 4))
    return 0.2126 * srgb_to_linear(r) + 0.7152 * srgb_to_linear(g) + 0.0722 * srgb_to_linear(b)


def contrast(a, b):
    la, lb = sorted((luminance(a), luminance(b)), reverse=True)
    return (la + 0.05) / (lb + 0.05)


def main():
    css = CSS.read_text(encoding="utf-8")
    # Base rule for text inputs: selector list containing input[type=text]
    rule = re.search(r'([^{}]*input\[type=["\']?text["\']?\][^{}]*)\{([^}]*)\}', css)
    if not rule:
        print("no input[type=text] rule found in css/style.css")
        return 1
    border = re.search(r'border\s*:[^;]*?(#[0-9a-fA-F]{3,6})', rule.group(2))
    if not border:
        print("no hex border colour on input[type=text] rule")
        return 1
    color = border.group(1)
    ratio = contrast(color, "#ffffff")
    print("input border %s contrast %.2f:1 against #ffffff (minimum %.1f:1)" % (color, ratio, MIN_RATIO))
    if ratio < MIN_RATIO:
        print("FAIL: contrast %.2f:1 is below %.1f:1" % (ratio, MIN_RATIO))
        return 1
    print("OK")
    return 0


if __name__ == "__main__":
    sys.exit(main())
