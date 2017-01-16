console.log("stuff");

$('.html-content img').each(function() {
    $(this).addClass("img-thumbnail");
    $(this).wrap($("<a>", {
        href: $(this).attr('src'),
        class: 'test',
        'data-lightbox': 'all',
    }));
    $(this).show();
});