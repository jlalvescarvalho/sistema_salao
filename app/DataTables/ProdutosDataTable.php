<?php

namespace App\DataTables;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProdutosDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $editarButton = '<button title="Editar" class="btn" style="margin-right: 5px;"><a href="' . route('produtos.edit', ['produto' => $row->id]) . '"><i class="fas fa-edit"></i></a></button>';
                $deletarButton = '<form method="POST" action="' . route('produtos.destroy', ['produto' => $row->id]) . '" style="display: inline;">' . csrf_field() . method_field('DELETE') . '<button type="submit" title="Deletar" class="btn"><i class="fas fa-trash-alt"></i></button></form>';
                return $editarButton . $deletarButton;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Produto $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('produtos-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(2)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->title('ID'),
            Column::make('codbarra')->title('Código de Barras'),
            Column::make('descricao')->title('Descrição'),
            Column::make('un')->title('Un'),
            Column::make('preco_custo')->title('Custo')->renderJs('number', '.', ',', '2', ''),
            Column::make('preco_venda')->title('Venda')->renderJs('number', '.', ',', '2', ''),
            Column::make('estoqueinicial')->title('Estoque'),
            Column::make('created_at')->date_format('Y-m-d')->title('Criado'),
            Column::computed('action')->addClass('text-center')->title('Ações')->width('90px'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Produtos_' . date('YmdHis');
    }
}
