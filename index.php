<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSync | Software para Quintas y Salones de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            color: white;
            padding: 100px 0;
        }
        .feature-icon {
            font-size: 3rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
        .cta-section {
            background-color: #f8f9fa;
            border-top: 5px solid #0d6efd;
        }
        .btn-custom {
            padding: 12px 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#"><i class="fa-solid fa-calendar-check text-primary"></i> Event<span class="text-primary">Sync</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#beneficios">Beneficios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#modulos">Módulos</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary btn-sm fw-bold px-3 py-2" href="#contacto">Solicitar Demo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center text-md-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <span class="badge bg-primary mb-3 px-3 py-2 text-uppercase tracking-wide">El ERP de los Eventos</span>
                    <h1 class="display-4 fw-bold lh-sm mb-4">El control total de tu Quinta o Salón, <span class="text-info">en un solo lugar.</span></h1>
                    <p class="lead mb-4 opacity-75">EventSync centraliza tu cobranza, automatiza tus recordatorios de pago y separa inteligentemente tus eventos sociales de los escolares. Adiós a las libretas, hola a la rentabilidad.</p>
                    <div class="d-grid gap-3 d-sm-flex">
                        <a href="#contacto" class="btn btn-primary btn-lg btn-custom shadow-sm"><i class="fa-solid fa-rocket me-2"></i> Moderniza tu Negocio</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Dashboard EventSync" class="img-fluid rounded-4 shadow-lg border border-secondary">
                </div>
            </div>
        </div>
    </header>

    <section class="py-5 text-center" id="beneficios">
        <div class="container py-5">
            <h2 class="fw-bold mb-5">Deja que el software trabaje (y cobre) por ti</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="feature-icon"><i class="fa-solid fa-cash-register"></i></div>
                        <h4 class="fw-bold">Caja Única Maestra</h4>
                        <p class="text-muted">No importa si el pago es el abono de un alumno o el anticipo de una boda. Todo fluye a un solo corte de caja para darte liquidez real, al centavo.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="feature-icon"><i class="fa-brands fa-whatsapp text-success"></i></div>
                        <h4 class="fw-bold">Cobranza en Automático</h4>
                        <p class="text-muted">Olvídate de perseguir clientes. EventSync envía recordatorios de vencimiento y comprobantes de pago directamente por correo y WhatsApp.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4">
                        <div class="feature-icon"><i class="fa-solid fa-cloud"></i></div>
                        <h4 class="fw-bold">100% en la Nube</h4>
                        <p class="text-muted">Revisa cómo van las ventas, quién debe dinero y qué eventos hay este fin de semana, todo desde tu celular, tablet o computadora.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light" id="modulos">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Eventos Escolares" class="img-fluid rounded-3 shadow">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <span class="text-primary fw-bold text-uppercase">Módulo Académico</span>
                    <h2 class="fw-bold mb-3">Dominio total en Graduaciones</h2>
                    <p class="lead text-muted mb-4">Administrar grupos grandes ya no es un dolor de cabeza. Lleva un control milimétrico del saldo de cada alumno.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Venta por Paquetes Dinámicos.</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Control de servicios adicionales individuales.</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Estados de cuenta personalizados por alumno.</li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center flex-lg-row-reverse mt-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Bodas y Eventos" class="img-fluid rounded-3 shadow">
                </div>
                <div class="col-lg-6 pe-lg-5">
                    <span class="text-primary fw-bold text-uppercase">Módulo Particular</span>
                    <h2 class="fw-bold mb-3">Bodas, XV Años y Corporativos</h2>
                    <p class="lead text-muted mb-4">Cotiza eventos por volumen y asegura tus anticipos a tiempo con cronogramas de liquidación inteligentes.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Cotizaciones exactas por número de invitados (Pax).</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Control de extras al contrato global (horas extra, descorche).</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Semáforo visual de cuentas por cobrar.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section py-5 text-center" id="contacto">
        <div class="container py-5">
            <h2 class="fw-bold mb-3">¿Listo para llevar tu Quinta al siguiente nivel?</h2>
            <p class="lead text-muted mb-5">Digitaliza tu negocio, evita fugas de dinero y ofrece un servicio de primer nivel a tus clientes.</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="bg-white p-4 rounded-3 shadow-sm text-start">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Recinto / Quinta</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Ej. Quinta San José">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tu Nombre</label>
                            <input type="text" class="form-control form-control-lg" placeholder="¿Con quién tenemos el gusto?">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">WhatsApp</label>
                            <input type="tel" class="form-control form-control-lg" placeholder="Para contactarte rápido">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg btn-custom">Quiero ver el sistema en acción</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4 text-center">
        <div class="container">
            <p class="mb-0">&copy; 2026 EventSync ERP. Todos los derechos reservados.</p>
            <small class="text-muted">Desarrollado para la gestión inteligente de recintos y eventos.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>