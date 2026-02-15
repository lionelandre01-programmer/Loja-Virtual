<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIONANDRE - COMPANY</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: sans-serif;
            color: black;
        }

        body{
            height: auto;
            width: 100dvw;
            padding: 3px;
        }

        main{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .factura-container{
            width: 90%;
            max-width: 900px;
            background: white;
            padding: 30px;
            border-radius: 5px;
        }

        .factura-header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid black;
            padding-bottom: 15px;
        }

        .company-info h2{
            font-size: 24px;
            margin-bottom: 5px;
        }

        .factura-info{
            text-align: right;
        }

        .factura-info p{
            margin: 3px 0;
        }

        .cliente-info{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .cliente-info div{
            display: flex;
            flex-direction: column;
            margin-bottom: 1%;
        }

        .cliente-info label{
            font-weight: bold;
            margin-bottom: 3px;
        }

        .items-table{
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        .items-table thead{
            background-color: #333;
            color: white;
        }

        .items-table th{
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .items-table td{
            padding: 12px;
            border: 1px solid #ddd;
        }

        .items-table tbody tr:nth-child(even){
            background-color: #f9f9f9;
        }

        .items-table tbody tr:hover{
            background-color: #f0f0f0;
        }

        .totals-section{
            display: flex;
            justify-content: flex-end;
            margin: 20px 0;
        }

        .totals-box{
            width: 300px;
            border: 2px solid black;
            padding: 15px;
            border-radius: 5px;
        }

        .totals-box div{
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .totals-box .total-final{
            border-top: 2px solid black;
            padding-top: 10px;
            margin-top: 10px;
            font-weight: bold;
            font-size: 16px;
        }

        .status-section{
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .status-label{
            font-weight: bold;
            display: inline-block;
            margin-right: 10px;
        }

        .status-badge{
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
        }

        .status-badge.pendente{
            background-color: #f39c12;
        }

        .status-badge.processando{
            background-color: #3498db;
        }

        .status-badge.enviado{
            background-color: #2ecc71;
        }

        .status-badge.entregue{
            background-color: #27ae60;
        }

        .status-badge.cancelado{
            background-color: #e74c3c;
        }

        .endereco-section{
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .endereco-title{
            font-weight: bold;
            margin-bottom: 10px;
        }

        .print-button{
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .print-button:hover{
            background-color: #555;
        }

        @media print{
            header, .print-button{
                display: none;
            }

            body{
                height: auto;
            }
        }

        @media(max-width: 768px){

            form{
                width: 80%;
            }

            header{
                padding: 10%;
            }

            .cliente-info{
                grid-template-columns: 1fr;
            }

            .items-table{
                font-size: 12px;
            }

            .items-table th, .items-table td{
                padding: 8px;
            }

        }
        
    </style>
</head>
<body>

    <main>
        <div class="factura-container">
            <!-- Cabeçalho da Factura -->
            <div class="factura-header">
                <div class="company-info">
                    <h2>LIONANDRE'S FASHION</h2>
                    <p>Loja Virtual - Vendas Online</p>
                </div>
                <div class="factura-info">
                    <p><strong>FACTURA</strong></p>
                    <p>Nº Encomenda: <strong>{{ $encomenda->id }}</strong></p>
                    <p>Data: <strong>{{ $encomenda->created_at->format('d/m/Y') }}</strong></p>
                </div>
            </div>

            <!-- Informações do Cliente -->
            <div class="cliente-info">
                <div>
                    <label>Encomendador:</label>
                    <p>{{ $encomenda->User->first_name }} {{ $encomenda->User->last_name }}</p>
                </div>
                <div>
                    <label>Email:</label>
                    <p>{{ $encomenda->User->email }}</p>
                </div>
                <div>
                    <label>Contacto:</label>
                    <p>{{ $encomenda->User->phone ?? 'Não informado' }}</p>
                </div>
                <div>
                    <label>Data Encomenda:</label>
                    <p>{{ $encomenda->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <!-- Estado da Encomenda -->
            <div class="status-section">
                <span class="status-label">Estado da Encomenda:</span>
                <span class="status-badge {{ strtolower($encomenda->estado) }}">
                    {{ ucfirst($encomenda->estado) }}
                </span>
            </div>

            <!-- Tabela de Produtos -->
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $encomendas as $item )
                    <tr>
                        <td>{{ $item->Produto->name }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>{{ number_format($item->preco, 2, ',', '.') }} kz</td>
                        <td>{{ number_format($item->quantidade * $item->preco, 2, ',', '.') }} kz</td>
                    </tr>

                    @empty

                    <h1>Sem Itens nesta encomenda</h1>

                    @endforelse
                </tbody>
            </table>

            <!-- Totais -->
            <div class="totals-section">
                <div class="totals-box">
                    <div>
                        <span>Subtotal:</span>
                        <span>{{ number_format($encomenda->total, 2, ',', '.') }} kz</span>
                    </div>
                    <div>
                        <span>Imposto (IVA 14%):</span>
                        <span>{{ number_format($encomenda->total * 0.14, 2, ',', '.') }} kz</span>
                    </div>
                    <div class="total-final">
                        <span>Total:</span>
                        <span>{{ number_format($encomenda->total * 1.14, 2, ',', '.') }} kz</span>
                    </div>
                </div>
            </div>

            <!-- Endereço de Entrega -->
            <div class="endereco-section">
                <div class="endereco-title">Endereço de Entrega:</div>
                <p>{{ $encomenda->endereco }}</p>
            </div>

        </div>
    </main>
</body>
</html>