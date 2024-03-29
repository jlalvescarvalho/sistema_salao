<?php

namespace App\DataTables;

use App\Models\Servico;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use JeroenNoten\LaravelAdminLte\AdminLte;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServicosDataTable extends DataTable
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
                $editarButton = '<button title="Editar" class="btn" style="margin-right: 5px;"><a href="' . route('servicos.edit', ['servico' => $row->id]) . '"><i class="fas fa-edit"></i></a></button>';
                $deletarButton = '<form method="POST" action="' . route('servicos.destroy', ['servico' => $row->id]) . '" style="display: inline;">' . csrf_field() . method_field('DELETE') . '<button type="submit" title="Deletar" class="btn"><i class="fas fa-trash-alt"></i></button></form>';
                return $editarButton . $deletarButton;
            })
            ->setRowId('id');
    }
    // <button title="Visualizar" class="btn"><a href="{{ route('quartos.view', ['id' => $qrt->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></button>
    /**
     * Get the query source of dataTable.
     */
    public function query(Servico $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->language(config('adminlte.plugins.Datatables.language'))
            ->setTableId('servicos-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('pdf'),
                Button::make('print'),

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
            Column::make('preco_custo')->title('Custo')->renderJs('number', '.', ',', '2', ''),
            Column::make('preco_venda')->title('Venda')->renderJs('number', '.', ',', '2', ''),
            Column::make('created_at')->date_format('Y-m-d')->title('Cadastrado'),
            Column::computed('action')->addClass('text-center')->title('Ações'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Servicos_' . date('YmdHis');
    }
}
