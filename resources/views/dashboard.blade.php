@extends('layouts.app')

@section('content')
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
            <div class="container mt-4">
                <h2 class="text-center">Ejemplo de Tabla</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Juan Pérez</td>
                            <td>juan.perez@example.com</td>
                            <td>2023-01-15</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>María López</td>
                            <td>maria.lopez@example.com</td>
                            <td>2023-02-20</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Carlos Ruiz</td>
                            <td>carlos.ruiz@example.com</td>
                            <td>2023-03-10</td>
                        </tr>
                    </tbody>
                </table>
            </div>

    
@endsection