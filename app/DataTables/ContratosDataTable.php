<?php

namespace App\DataTables;

use App\Models\Contrato;
use App\Models\ContratoPacote;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContratosDataTable extends DataTable
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
                $editarButton = '<button title="Editar" class="btn" style="margin-right: 5px;"><a href="' . route('contratos.edit', ['contrato' => $row->id]) . '"><i class="fas fa-edit"></i></a></button>';
                return $editarButton;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ContratoPacote $model): QueryBuilder
    {
        return $model->newQuery()->join('clientes', function ($join) {
            $join->on('contratos_pacotes.id_cliente', '=', 'clientes.id');
            // })->join('pacotes', function ($join1) {
            //     $join1->on('contratos_pacotes.id_pacote', '=', 'pacotes.id');
        })->select('contratos_pacotes.id', 'clientes.nome',  'contratos_pacotes.data_contrato', 'contratos_pacotes.data_vencimento');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contratos-table')
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
            Column::make('nome')->title('cliente'),
            // Column::make('nome')->title('pacote'),
            Column::make('data_contrato')->title('data contrato'),
            Column::make('data_vencimento')->title('vencimento'),
            // Column::computed('action')->addClass('text-center')->title('Ações'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Contratos_' . date('YmdHis');
    }
}
