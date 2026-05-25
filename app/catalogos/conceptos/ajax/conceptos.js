$(document).ready(function() {
    let tablaConceptos;

    // Inicializar DataTables
    const inicializarTabla = () => {
        tablaConceptos = $('#tablaConceptos').DataTable({
            "ajax": {
                "url": "php/operaciones_conceptos.php",
                "type": "POST",
                "data": { accion: 'leer' },
                "dataSrc": "data"
            },
            "columns": [
                { "data": "IdConcepto" },
                { "data": "Descripcion" },
                { 
                    "data": "TipoMovimiento",
                    "render": function(data) {
                        return data === 'Ingreso' 
                            ? `<span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i>${data}</span>` 
                            : `<span class="badge bg-danger"><i class="fas fa-arrow-down me-1"></i>${data}</span>`;
                    }
                },
                { 
                    "data": "Activo",
                    "render": function(data) {
                        return data == 1 
                            ? '<span class="badge bg-info">Activo</span>' 
                            : '<span class="badge bg-secondary">Inactivo</span>';
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        let btnEstado = row.Activo == 1 
                            ? `<button class="btn btn-sm btn-outline-danger btn-desactivar" data-id="${row.IdConcepto}" title="Desactivar"><i class="fas fa-ban"></i></button>`
                            : `<button class="btn btn-sm btn-outline-success btn-activar" data-id="${row.IdConcepto}" title="Activar"><i class="fas fa-check"></i></button>`;
                            
                        return `
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-primary btn-editar" 
                                    data-id="${row.IdConcepto}" 
                                    data-desc="${row.Descripcion}" 
                                    data-tipo="${row.TipoMovimiento}" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                ${btnEstado}
                            </div>
                        `;
                    }
                }
            ],
            "language": { "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" }
        });
    };

    inicializarTabla();

    // Abrir modal para Nuevo Concepto
    $('#btnNuevoConcepto').click(function() {
        $('#formConcepto')[0].reset();
        $('#IdConcepto').val('');
        $('#accion').val('crear');
        $('#modalTitulo').text('Nuevo Concepto');
        $('#modalConcepto').modal('show');
    });

    // Abrir modal para Editar Concepto
    $('#tablaConceptos tbody').on('click', '.btn-editar', function() {
        $('#formConcepto')[0].reset();
        $('#IdConcepto').val($(this).data('id'));
        $('#Descripcion').val($(this).data('desc'));
        $('#TipoMovimiento').val($(this).data('tipo'));
        $('#accion').val('editar');
        $('#modalTitulo').text('Editar Concepto');
        $('#modalConcepto').modal('show');
    });

    // Enviar Formulario (Crear/Editar)
    $('#formConcepto').submit(function(e) {
        e.preventDefault();
        let btn = $('#btnGuardar');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Guardando...');

        $.ajax({
            url: "php/operaciones_conceptos.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(res) {
                if(res.status === 'success') {
                    $('#modalConcepto').modal('hide');
                    tablaConceptos.ajax.reload(null, false);
                    Swal.fire('¡Éxito!', res.message, 'success');
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error crítico', 'Fallo de comunicación con el servidor.', 'error');
            },
            complete: function() {
                btn.prop('disabled', false).html('Guardar Concepto');
            }
        });
    });

    // Cambiar Estado (Activar/Desactivar)
    $('#tablaConceptos tbody').on('click', '.btn-desactivar, .btn-activar', function() {
        let id = $(this).data('id');
        let accionEstado = $(this).hasClass('btn-desactivar') ? 'desactivar' : 'activar';
        let textoAlerta = accionEstado === 'desactivar' ? 'Este concepto no aparecerá en nuevas operaciones.' : 'El concepto volverá a estar disponible.';

        Swal.fire({
            title: '¿Estás seguro?',
            text: textoAlerta,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, continuar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("php/operaciones_conceptos.php", { accion: accionEstado, IdConcepto: id }, function(res) {
                    if(res.status === 'success') {
                        tablaConceptos.ajax.reload(null, false);
                        Swal.fire('Actualizado', res.message, 'success');
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                }, "json");
            }
        });
    });
});