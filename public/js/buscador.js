$(document).ready(function () {
    $('input[name="buscador"]').on('keyup', function () {
        let query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: '/buscar/zapatos',
                type: 'GET',
                data: { q: query },
                success: function (data) {
                    let resultados = $('#resultados');
                    resultados.empty();

                    if (data.length > 0) {
                        data.forEach(function (zapato) {
                            resultados.append(`
                                <li class="list-group-item resultado-item" data-id="${zapato.id}">
                                    ${zapato.nombre}
                                </li>
                            `);
                        });
                    } else {
                        resultados.append('<li class="list-group-item">No se encontraron resultados.</li>');
                    }

                    resultados.show();
                }
            });
        } else {
            $('#resultados').empty().hide();
        }
    });

    // Clic en el resultado
    $(document).on('click', '.resultado-item', function () {
        const zapatoId = $(this).data('id');
        window.location.href = `/tienda/${zapatoId}/preview`;
    });

    // Ocultar resultados al hacer clic fuera
    $(document).click(function (e) {
        if (!$(e.target).closest('form').length) {
            $('#resultados').empty().hide();
        }
    });
});
