<?php

namespace App\DataTables;

use App\Models\Pacote;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PacotesDataTable extends DataTable
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
                $editarButton = '<button title="Editar" class="btn" style="margin-right: 5px;"><a href="' . route('pacotes.edit', ['pacote' => $row->id]) . '"><i class="fas fa-edit"></i></a></button>';
                $deletarButton = '<form method="POST" action="' . route('pacotes.destroy', ['pacote' => $row->id]) . '" style="display: inline;">' . csrf_field() . method_field('DELETE') . '<button type="submit" title="Deletar" class="btn"><i class="fas fa-trash-alt"></i></button></form>';
                return $editarButton . $deletarButton;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pacote $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pacotes-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::make('nome')->title('Nome'),
            Column::make('descricao')->title('Descrição'),
            Column::make('valor')->title('Valor')->renderJs('number', '.', ',', '2', ''),
            Column::make('qtd_sessoes')->title('Qtde. Sessões'),
            Column::make('validade')->title('Validade'),
            Column::make('created_at')->date_format('Y-m-d')->title('Criado'),
            Column::computed('action')
                ->addClass('text-center')->title('Ações'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pacotes_' . date('YmdHis');
    }
}
