var apr_width = 0;
var sec_curnt_font_val1 = '';

function applyFont(element, fontSpec) {
    if (fontSpec != 'Other Font') {
        apr_width = 0;
        if (!fontSpec) {
            // Font was cleared
            console.log('You cleared font');

            $(element).css({
                fontFamily: 'inherit',
                fontWeight: 'normal',
                fontStyle: 'normal'
            });
            return;
        }
        console.log('You selected font: ' + fontSpec);

        // Split font into family and weight/style
        var tmp = fontSpec.split(':'),
            family = tmp[0],
            variant = tmp[1] || '400',
            weight = parseInt(variant, 10),
            italic = /i$/.test(variant);

        // Apply selected font to element
        $(element).css({
            fontFamily: "'" + family + "'",
            fontWeight: weight,
            fontStyle: italic ? 'italic' : 'normal'
        });
    } else {
        fontSpec = 'Inter';
        console.log('You selected font: ' + fontSpec);
        // Split font into family and weight/style
        var tmp = fontSpec.split(':'),
            family = tmp[0],
            variant = tmp[1] || '400',
            weight = parseInt(variant, 10),
            italic = /i$/.test(variant);

        // Apply selected font to element
        $(element).css({
            fontFamily: "'" + family + "'",
            fontWeight: weight,
            fontStyle: italic ? 'italic' : 'normal'
        });
    }
    $(function () {
        // Highlight code samples:
        hljs.configure({
            tabReplace: '   ', // 3 spaces
        });
        $('pre code').each(function () {
            hljs.highlightBlock(this);
        });

    });
}
