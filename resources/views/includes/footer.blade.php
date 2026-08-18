<footer style="background:linear-gradient(135deg, #14532d 0%, #166534 45%, #22c55e 100%); color:#f8fafc; padding:2rem 1rem; margin-top:2.5rem; box-shadow:0 -8px 24px rgba(22,101,52,.18); border-top:1px solid rgba(255,255,255,.12);">
    <div style="max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:1.5rem; align-items:start;">
        <div>
            <h3 style="margin:0 0 0.5rem; font-size:1.05rem; font-weight:700; letter-spacing:0.03em;">Administración SENA</h3>
            <p style="margin:0; font-size:0.95rem; line-height:1.6; color:#cbd5e1;">Gestión académica y operativa para una mejor experiencia institucional.</p>
        </div>

        <div style="display:flex; flex-direction:column; gap:0.55rem;">
            <a href="{{ route('course.create') }}" style="color:#e2e8f0; text-decoration:none; font-size:0.95rem;">Cursos</a>
            <a href="{{ route('area.create') }}" style="color:#e2e8f0; text-decoration:none; font-size:0.95rem;">Áreas</a>
            <a href="{{ route('training_center.create') }}" style="color:#e2e8f0; text-decoration:none; font-size:0.95rem;">Centros</a>
        </div>

        <div style="text-align:right;">
            <p style="margin:0; font-size:0.95rem; color:#cbd5e1;">&copy; {{ date('Y') }} SENA. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>