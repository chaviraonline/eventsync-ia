<?php include '../../includes/header.php'; ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 text-gray-800"><i class="fas fa-tags me-2"></i>Catálogo de Conceptos de Caja</h2>
        <button class="btn btn-primary shadow-sm" id="btnNuevoConcepto">
            <i class="fas fa-plus fa-sm text-white-50 me-1"></i> Nuevo Concepto
        </button>
    </div>

    <!-- Tabla de Conceptos -->
    <div class="card shadow mb-4 border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped w-100" id="tablaConceptos">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Tipo de Movimiento</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Llenado dinámico vía AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para CRUD de Conceptos -->
<div class="modal fade" id="modalConcepto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitulo">Nuevo Concepto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formConcepto">
                <div class="modal-body">
                    <input type="hidden" id="IdConcepto" name="IdConcepto">
                    <input type="hidden" id="accion" name="accion" value="crear">
                    
                    <div class="mb-3">
                        <label for="Descripcion" class="form-label fw-bold">Descripción del Concepto</label>
                        <input type="text" class="form-control" id="Descripcion" name="Descripcion" required placeholder="Ej. Pago de Sonido, Abono Colegiatura">
                    </div>
                    
                    <div class="mb-3">
                        <label for="TipoMovimiento" class="form-label fw-bold">Tipo de Movimiento</label>
                        <select class="form-select" id="TipoMovimiento" name="TipoMovimiento" required>
                            <option value="">Selecciona un tipo...</option>
                            <option value="Ingreso">Ingreso (Entrada de dinero)</option>
                            <option value="Egreso">Egreso (Salida de dinero)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar Concepto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Archivo lógico del módulo -->
<script src="assets/ajax/conceptos.js"></script>

<?php include '../../includes/footer.php'; ?>