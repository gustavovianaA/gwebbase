$(document).ready(function () {
    //$('[data-toggle="tooltip"]').tooltip();

    $('.summernote').summernote({
        lang: 'pt-BR'
    });

    $('.input-money-value').mask('000.000.000.000.000,00', { reverse: true });

    //hide-show sidebar
    $('#manipulate-sidebar').click(function () {
        if ($('#main-sidebar').hasClass('d-none')) {
            $('#main-sidebar').removeClass('d-none')
            $('#manipulate-sidebar').removeClass('fa-chevron-right')
            $('#manipulate-sidebar').addClass('fa-chevron-left')
            $('#main-app-content').removeClass('col-lg-12')
            $('#main-app-content').addClass('col-lg-9')
        } else {
            $('#main-sidebar').addClass('d-none')

            $('#manipulate-sidebar').removeClass('fa-chevron-left')
            $('#manipulate-sidebar').addClass('fa-chevron-right')
            $('#main-app-content').removeClass('col-lg-9')
            $('#main-app-content').addClass('col-lg-12')
        }
    })

    //hide-show changing images
    $('.changeImagesRadio').change(function () {
        let value = $(this).val();

        if (value == 1) {
            $("#cover-gallery").show();
        } else {
            $("#cover-gallery").hide();
        }
    });
})