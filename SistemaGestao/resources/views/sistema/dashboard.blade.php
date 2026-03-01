<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LIONANDRE COMPANY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, goldenrod 0%, #c3a70aff 100%);
            color: white;
            padding: 30px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 0 20px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .logo {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sidebar-menu {
            list-style: none;
            margin-top: 30px;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar-menu a:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
            border-left-color: #fff;
        }

        .sidebar-menu a.active {
            background-color: rgba(255,255,255,0.2);
            color: white;
            border-left-color: #fff;
        }

        .menu-icon {
            margin-right: 15px;
            font-size: 18px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 30px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .header h1 {
            font-size: 28px;
            color: #333;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Cards Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .stat-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 14px;
            color: #888;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #667eea;
        }

        /* Content Sections */
        .section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #667eea;
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f8f9fa;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        /* Status Badges */
        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
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

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5568d3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Charts Area */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #888;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding: 0;
                transform: translateX(-100%);
                transition: transform 0.3s;
                z-index: 1000;
            }

            .some{
                display: none;
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">🛍️ LIONANDRE'S FASHION</div>
                <small>Loja Virtual</small>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('dashboard') }}" class="active"><span class="menu-icon">📊</span> Dashboard</a></li>
                <li><a href="{{ route('loja') }}"><span class="menu-icon">📦</span> Produtos</a></li>
                <li><a href="{{ route('encomendas') }}"><span class="menu-icon">🛒</span> Encomendas</a></li>
                <li><a href="#"><span class="menu-icon">👥</span> Clientes</a></li>
                <li><a href="#"><span class="menu-icon">📈</span> Vendas</a></li>
                <li><a href="#"><span class="menu-icon">⚙️</span> Configurações</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div>
                    <h1>Dashboard</h1>
                    <p style="color: #888; margin-top: 5px;">Bem-vindo de volta! 👋</p>
                </div>
                <div class="user-section">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr(auth()->user()->last_name ?? '', 0, 1)) }}</div>
                    <span>{{ auth()->user()->first_name ?? 'Utilizador' }} {{ auth()->user()->last_name ?? '' }}</span>
                    <a href="{{ route('logout') }}" class="logout-btn">Sair</a>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div class="stat-label">Total de Produtos</div>
                    <div class="stat-value">{{ $totalProdutos ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🛒</div>
                    <div class="stat-label">Encomendas Totais</div>
                    <div class="stat-value">{{ $totalEncomendas ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-label">Receita Total</div>
                    <div class="stat-value">{{ number_format($receitaTotal ?? 0, 2, ',', '.') }}kz</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-label">Total de Clientes</div>
                    <div class="stat-value">{{ $totalClientes ?? 0 }}</div>
                </div>
            </div>

            <!-- Encomendas Recentes -->
            <div class="section">
                <div class="section-title">📋 Encomendas Recentes</div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="some">ID Encomenda</th>
                                <th>Cliente</th>
                                <th class="some">Data</th>
                                <th class="some">Total</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($encomendasRecentes ?? [] as $encomenda)
                            <tr>
                                <td class="some">#{{ $encomenda->id }}</td>
                                <td>{{ $encomenda->user->first_name ?? 'N/A' }}</td>
                                <td class="some">{{ $encomenda->created_at->format('d/m/Y H:i') }}</td>
                                <td class="some">{{ number_format($encomenda->total, 2, ',', '.') }}kz</td>
                                <td>
                                    @php
                                        $estadoBadge = match($encomenda->estado) {
                                            'pendente' => 'badge-warning',
                                            'processando' => 'badge-info',
                                            'enviado' => 'badge-info',
                                            'entregue' => 'badge-success',
                                            'cancelado' => 'badge-danger',
                                            default => 'badge-warning'
                                        };
                                    @endphp
                                    <span class="badge {{ $estadoBadge }}">{{ ucfirst($encomenda->estado) }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('showEncomenda', $encomenda->id) }}" class="btn btn-primary">Ver</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 30px;">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">📭</div>
                                        <p>Nenhuma encomenda no sistema</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Produtos Populares -->
            <div class="section">
                <div class="section-title">🌟 Produtos Mais Vendidos</div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Categoria</th>
                                <th class="some">Preço</th>
                                <th class="some">Stock</th>
                                <th>Vendas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produtosPopulares ?? [] as $produto)
                            <tr>
                                <td>{{ $produto->Produto->name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($produto->Produto->Categoria->name) ?? 'N/A' }}</td>
                                <td class="some">{{ number_format($produto->Produto->price, 2, ',', '.') }}kz</td>
                                <td class="some">{{ $produto->Produto->quantity ?? 0 }} un</td>
                                <td>
                                    @if(($produto->quantidade ?? 0) > 10)
                                        <span class="badge badge-success">{{ $produto->quantidade ?? 0 }} un</span>
                                    @elseif(($produto->quantidade ?? 0) > 0)
                                        <span class="badge badge-warning">{{ $produto->quantidade ?? 0 }} un</span>
                                    @else
                                        <span class="badge badge-danger">Sem stock</span>
                                    @endif
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 30px;">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">📦</div>
                                        <p>Nenhum produto no sistema</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Acções Rápidas -->
            <div class="section">
                <div class="section-title">⚡ Ações Rápidas</div>
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="{{ route('create') }}" class="btn btn-primary">➕ Adicionar Produto</a>
                    <a href="{{ route('carrinho') }}" class="btn btn-primary">➕ Criar Encomenda</a>
                    <a href="#" class="btn btn-secondary">📊 Ver Relatórios</a>
                    <a href="#" class="btn btn-secondary">⚙️ Configurações</a>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
