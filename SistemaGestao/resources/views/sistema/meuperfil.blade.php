<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - LIONANDRE COMPANY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, goldenrod 0%, #c3a70aff 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 28px;
            color: #333;
        }

        .back-btn {
            background-color: #667eea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s;
        }

        .back-btn:hover {
            background-color: #5568d3;
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, goldenrod 0%, #c3a70aff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            font-weight: bold;
            margin: 0 auto 20px;
            box-shadow: 0 5px 15px rgba(251, 223, 9, 1);
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-role {
            background: linear-gradient(135deg, goldenrod 0%, #c3a70aff 100%);
            color: white;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .profile-email {
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
            word-break: break-all;
        }

        .profile-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Details Section */
        .details-section {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #fee505ff;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group input:disabled {
            background-color: #f5f5f5;
            color: #999;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
        }

        .btn-save {
            background-color: #27ae60;
            color: white;
            flex: 1;
        }

        .btn-save:hover {
            background-color: #229954;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }

        .btn-cancel {
            background-color: #95a5a6;
            color: white;
            flex: 1;
        }

        .btn-cancel:hover {
            background-color: #7f8c8d;
        }

        /* Activity Section */
        .activity-section {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-top: 30px;
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 15px;
            border-left: 4px solid #fdd406ff;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .activity-time {
            font-size: 12px;
            color: #888;
            display: block;
            margin-bottom: 5px;
        }

        .activity-text {
            color: #333;
            font-size: 14px;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #888;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border-left: 4px solid #ffc107;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
            }
        }

        /* Edit Mode Toggle */
        .edit-toggle {
            position: relative;
            display: inline-flex;
            align-items: center;
            background-color: #f0f0f0;
            padding: 5px;
            border-radius: 25px;
        }

        .edit-toggle button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 13px;
            transition: all 0.3s;
        }

        .edit-toggle button.active {
            background-color: #667eea;
            color: white;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>👤 Meu Perfil</h1>
            <a href="{{ route('loja') }}" class="back-btn">← Voltar</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr(auth()->user()->last_name ?? '', 0, 1)) }}
                </div>
                <div class="profile-name">
                    {{ auth()->user()->first_name ?? 'Utilizador' }} {{ auth()->user()->last_name ?? '' }}
                </div>
                <div class="profile-role">
                    🔐 {{ ucfirst(auth()->user()->role ?? 'Cliente') }}
                </div>
                <div class="profile-email">
                    {{ auth()->user()->email }}
                </div>
                <div class="profile-actions">
                    <button class="btn btn-primary" onclick="toggleEditMode()">✏️ Editar Perfil</button>
                    <a href="{{ route('logout') }}" onclick="return confirm('Deseja Sair?')" class="btn btn-danger">🚪 Sair</a>

                    @if (Auth()->user()->role != 'cliente')
                        <a href="{{ route('dashboard') }}" class="btn btn-danger" style="background-color: goldenrod;">📊 DashBoard</a>
                    @endif
                </div>
            </div>

            <!-- Details Section -->
            <div class="details-section">
                <div class="section-title">📋 Detalhes da Conta</div>
                
                @if(session('success'))
                <div class="alert alert-success">
                    <span>✓</span>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    <span>✗</span>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                <form id="profileForm" action="{{ route('editUser') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">👤 Primeiro Nome</label>
                            <input type="text" id="first_name" name="first_name" 
                                   value="{{ auth()->user()->first_name ?? '' }}" 
                                   disabled required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">👤 Último Nome</label>
                            <input type="text" id="last_name" name="last_name" 
                                   value="{{ auth()->user()->last_name ?? '' }}" 
                                   disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">📧 Email</label>
                        <input type="email" id="email" name="email" 
                               value="{{ auth()->user()->email }}" 
                               disabled required>
                    </div>

                    @if (Auth()->user()->role != 'cliente')

                        <div class="form-group">
                            <label for="role">🔐 Tipo de Conta</label>
                            <select type="text" id="role" name="role" disabled>
                                <option value="administrador" @if(ucfirst(auth()->user()->role) == 'administrador') selected @endif>Administrador</option>
                                <option value="gestor" @if(ucfirst(auth()->user()->role) == 'gestor' ) selected @endif>Gestor</option>
                                <option value="funcionario" @if(ucfirst(auth()->user()->role) == 'funcionario') selected @endif>Funcionário</option>
                                <option value="cliente" @if(ucfirst(auth()->user()->role) == 'cliente' ) selected @endif>Cliente</option>
                            </select>
                        </div>

                    @else

                        <div class="form-group">
                            <label for="created_at">🔐 Tipo de Conta</label>
                            <input type="text" id="created_at"
                               value="{{ ucfirst(auth()->user()->role ?? 'Cliente') }}" 
                               disabled>
                        </div>

                    @endif

                    <div class="form-group">
                        <label for="created_at">📅 Data de Registo</label>
                        <input type="text" id="created_at" 
                               value="{{ auth()->user()->created_at->format('d/m/Y H:i') }}" 
                               disabled>
                    </div>

                    <div id="editActions" class="form-actions" style="display: none;">
                        <button type="submit" class="btn btn-save" onclick="return confirm('Deseja actualizar seus dados?')">💾 Guardar Alterações</button>
                        <button type="button" class="btn btn-cancel" onclick="toggleEditCancel()">❌ Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Activity Section -->
        <div class="activity-section">
            <div class="section-title">📊 Atividade da Conta</div>
            
            <div id="activityContainer">
                @php
                    $activities = [
                        [
                            'icon' => '✓',
                            'text' => 'Conta criada com sucesso',
                            'date' => auth()->user()->created_at->format('d/m/Y H:i')
                        ],
                        [
                            'icon' => '📧',
                            'text' => 'Email verificado',
                            'date' => auth()->user()->email_verified_at ? auth()->user()->email_verified_at->format('d/m/Y H:i') : 'Pendente'
                        ],
                        [
                            'icon' => '📷',
                            'text' => 'Imagem carregada com sucesso',
                            'date' => 'Recentemente'
                        ]
                    ];
                @endphp

                @if(count($activities) > 0)
                <ul class="activity-list">
                    @foreach($activities as $activity)
                    <li class="activity-item">
                        <span class="activity-time">{{ $activity['date'] }}</span>
                        <span class="activity-text">{{ $activity['icon'] }} {{ $activity['text'] }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <div class="empty-state">
                    <div class="empty-state-icon">📭</div>
                    <p>Sem atividade registada</p>
                </div>
                @endif
            </div>
        </div>

    </div>

    <script>
        function toggleEditMode() {
            const form = document.getElementById('profileForm');
            const editActions = document.getElementById('editActions');
            const inputs = form.querySelectorAll('input:not(#created_at)');
            const selects = form.querySelector('select');
            
            inputs.forEach(input => {
                input.disabled = false;
            });

            selects.disabled = false;
            
            editActions.style.display = editActions.style.display === 'none' ? 'flex' : 'none';
        }

        function toggleEditCancel() {
            const form = document.getElementById('profileForm');
            const editActions = document.getElementById('editActions');
            const inputs = form.querySelectorAll('input:not(#created_at)');
            const selects = form.querySelector('select');
            
            inputs.forEach(input => {
                input.disabled = true;
            });

            selects.disabled = true;
            
            editActions.style.display = editActions.style.display === 'none' ? 'flex' : 'none';
        }

    </script>
</body>
</html>
