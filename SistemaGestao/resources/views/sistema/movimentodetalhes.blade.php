<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Movimento - LIONANDRE COMPANY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

        /* Detalhes Container */
        .details-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .detail-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail-header h2 {
            grid-column: 1 / -1;
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 2px solid rgba(255,255,255,0.3);
            padding-bottom: 15px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 12px;
            font-weight: 600;
            opacity: 0.9;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .detail-value {
            font-size: 18px;
            font-weight: 600;
        }

        /* Main Details Section */
        .details-section {
            padding: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #667eea;
            color: #333;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .detail-field {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .detail-field label {
            display: block;
            font-weight: 700;
            color: #555;
            font-size: 13px;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .detail-field p {
            font-size: 16px;
            color: #333;
            word-break: break-word;
        }

        .detail-field.warning {
            border-left-color: #f39c12;
            background-color: #fef5e7;
        }

        .detail-field.warning label {
            color: #f39c12;
        }

        .detail-field.danger {
            border-left-color: #e74c3c;
            background-color: #fadbd8;
        }

        .detail-field.danger label {
            color: #e74c3c;
        }

        .detail-field.success {
            border-left-color: #27ae60;
            background-color: #d5f4e6;
        }

        .detail-field.success label {
            color: #27ae60;
        }

        .detail-field.info {
            border-left-color: #3498db;
            background-color: #d6eaf8;
        }

        .detail-field.info label {
            color: #3498db;
        }

        /* Nota Section */
        .nota-section {
            background-color: #f0f7ff;
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
        }

        .nota-title {
            font-weight: 700;
            color: #3498db;
            margin-bottom: 10px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .nota-content {
            color: #333;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        .nota-empty {
            color: #999;
            font-style: italic;
        }

        /* Update Info */
        .update-section {
            background-color: #fff3e0;
            border: 2px solid #f39c12;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
        }

        .update-title {
            font-weight: 700;
            color: #f39c12;
            margin-bottom: 10px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .update-content {
            color: #333;
            line-height: 1.6;
        }

        .update-empty {
            color: #999;
            font-style: italic;
        }

        /* Badge Styles */
        .badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-success {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .badge-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .badge-primary {
            background-color: #d6eaf8;
            color: #2c5282;
        }

        /* User Info Card */
        .user-card {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
        }

        .user-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .user-info h3 {
            color: #333;
            font-size: 16px;
            margin-bottom: 3px;
        }

        .user-info p {
            color: #888;
            font-size: 13px;
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
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
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline-item {
            display: flex;
            margin-bottom: 20px;
        }

        .timeline-marker {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #667eea;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-content p {
            color: #666;
            margin-bottom: 5px;
        }

        .timeline-content strong {
            color: #333;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .detail-header {
                grid-template-columns: 1fr;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>📋 Detalhes do Movimento</h1>
            <a href="{{ route('movimento') ?? '#' }}" class="back-btn">← Voltar</a>
        </div>

        <!-- Main Details Container -->
        <div class="details-container">
            <!-- Header Info -->
            <div class="detail-header">
                <h2>🔍 Informações Principais</h2>
                <div class="detail-item">
                    <span class="detail-label">ID do Movimento</span>
                    <span class="detail-value">#{{ $movimento->id ?? 'N/A' }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Tipo de Movimento</span>
                    <span class="detail-value">
                        @php
                            $movementIcons = [
                                'criação' => '✨',
                                'edição' => '✏️',
                                'alteração' => '🔄',
                                'eliminação' => '🗑️',
                                'venda' => '💰',
                                'compra' => '📦',
                                'devolução' => '↩️',
                                'ativação' => '✅',
                                'desativação' => '❌',
                            ];
                            $icon = $movementIcons[strtolower($movimento->movimento ?? '')] ?? '📝';
                        @endphp
                        {{ $icon }} {{ ucfirst($movimento->movimento ?? 'N/A') }}
                    </span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Data do Movimento</span>
                    <span class="detail-value">{{ $movimento->created_at->format('d/m/Y H:i:s') ?? 'N/A' }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Estado</span>
                    @php
                        $estadoClass = match(strtolower($movimento->movimento ?? '')) {
                            'eliminação' => 'danger',
                            'criação' => 'success',
                            'edição', 'alteração' => 'warning',
                            'venda', 'compra' => 'info',
                            default => 'primary'
                        };
                    @endphp
                    <span class="badge badge-{{ $estadoClass }}">{{ ucfirst($movimento->movimento ?? 'N/A') }}</span>
                </div>
            </div>

            <!-- Detalhes Principais -->
            <div class="details-section">
                <div class="section-title">📝 Detalhes do Movimento</div>

                <div class="detail-grid">
                    <div class="detail-field info">
                        <label>🏷️ Categoria</label>
                        <p>{{ ucfirst($movimento->category ?? 'Não especificada') }}</p>
                    </div>

                    <div class="detail-field info">
                        <label>🎯 Objeto</label>
                        <p>{{ $movimento->objecto ?? 'N/A' }}</p>
                    </div>

                    <div class="detail-field primary">
                        <label>🔢 Código</label>
                        <p>{{ $movimento->codigo ?? 'N/A' }}</p>
                    </div>

                    <div class="detail-field primary">
                        <label>📊 Quantidade</label>
                        <p>{{ $movimento->quantidade ?? 1 }} unidades</p>
                    </div>
                </div>

                <!-- Nota -->
                @if($movimento->nota)
                <div class="nota-section">
                    <div class="nota-title">📌 Nota / Motivo</div>
                    <div class="nota-content">{{ $movimento->nota }}</div>
                </div>
                @else
                <div class="nota-section">
                    <div class="nota-title">📌 Nota / Motivo</div>
                    <div class="nota-empty">Sem observações registadas</div>
                </div>
                @endif

                <!-- Atualizações (old_name ou alterações) -->
                @if($movimento->update)
                <div class="update-section">
                    <div class="update-title">🔄 Alterações Realizadas</div>
                    <div class="update-content">{{ $movimento->update }}</div>
                </div>
                @else
                <div class="update-section">
                    <div class="update-title">🔄 Alterações Realizadas</div>
                    <div class="update-empty">Sem alterações de dados registadas</div>
                </div>
                @endif

                <!-- Informações do Utilizador Responsável -->
                @if($movimento->user)
                <div class="user-card">
                    <div class="section-title">👤 Utilizador Responsável</div>
                    <div class="user-header">
                        <div class="user-avatar">
                            {{ strtoupper(substr($movimento->user->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($movimento->user->last_name ?? '', 0, 1)) }}
                        </div>
                        <div class="user-info">
                            <h3>{{ $movimento->user->first_name ?? '' }} {{ $movimento->user->last_name ?? '' }}</h3>
                            <p>{{ $movimento->user->email ?? '' }}</p>
                            <p style="margin-top: 5px;"><strong>Tipo:</strong> {{ ucfirst($movimento->user->role ?? 'cliente') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Timeline de Atividade -->
                <div style="margin-top: 30px;">
                    <div class="section-title">📅 Histórico</div>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker">✓</div>
                            <div class="timeline-content">
                                <p><strong>Criado em:</strong> {{ $movimento->created_at->format('d/m/Y \à\s H:i:s') }}</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">⟳</div>
                            <div class="timeline-content">
                                <p><strong>Última atualização:</strong> {{ $movimento->updated_at->format('d/m/Y \à\s H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="actions">
                    <a href="{{ route('movimento') }}" class="btn btn-secondary">← Voltar à Lista</a>
                    <a href="#" class="btn btn-primary">🖨️ Imprimir</a>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
