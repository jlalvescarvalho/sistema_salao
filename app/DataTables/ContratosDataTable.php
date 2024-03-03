<?php

namespace App\DataTables;

use App\Enums\StatusContratoPacote;
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
            ->editColumn('status', function ($row) {
                $status = StatusContratoPacote::from($row->status);
                return "<span class='badge badge-{$status->cor()}'>" . ucfirst($status->value) . "</span>";
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ContratoPacote $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(["cliente:id,nome", "pacote:id,nome"])
            ->select(
                'contratos_pacotes.id',
                'id_cliente',
                'id_pacote',
                'qtd_sessoes_restantes',
                'data_vencimento',
                'data_contrato',
                'status'
            );
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
            Column::make('cliente.nome')->title('Cliente'),
            Column::make('pacote.nome')->title('Pacote'),
            Column::make('qtd_sessoes_restantes')->title('Restantes'),
            Column::make('data_vencimento')->title('Vencimento'),
            Column::make('status')->title('Status'),
            Column::make('data_contrato')->title('Data Contrato'),
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
