<?php

namespace App\DataTables;

use App\Enums\StatusAgendamento;
use App\Models\AgendamentoPacote;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AgendamentoPacoteDataTable extends DataTable
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
                // $editarButton = '<button title="Editar" class="btn" style="margin-right: 5px;"><a href="' . route('pacotes.agendamentos.edit', ['agendamento' => $row->id]) . '"><i class="fas fa-edit"></i></a></button>';
                // $deletarButton = '<form method="POST" action="' . route('pacotes.agendamentos.destroy', ['agendamento' => $row->id]) . '" style="display: inline;">' . csrf_field() . method_field('DELETE') . '<button type="submit" title="Deletar" class="btn"><i class="fas fa-trash-alt"></i></button></form>';
                // return $editarButton;
                return "";
            })
            ->editColumn('status', function ($row) {
                $status = StatusAgendamento::from($row->status);
                return "<span class='badge badge-{$status->cor()}'>" . ucfirst($status->value) . "</span>";
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AgendamentoPacote $model): QueryBuilder
    {
        return $model->newQuery()
            ->select([
                'agendamento_pacotes.id',
                'id_contrato_pacote',
                'data_hora',
                'data_hora_chegada',
                'data_hora_finalizacao',
                'duracao',
                'observacao',
                'agendamento_pacotes.status',
            ])
            ->with([
                'contrato:id,id_cliente,id_pacote' => [
                    'cliente:id,nome,telefone',
                    'pacote:id,nome',
                ],
            ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->language(config('adminlte.plugins.Datatables.language'))
            ->setTableId('agendamentos-pacotes-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(3)
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
            Column::make('contrato.cliente.nome')->title('Cliente'),
            Column::make('contrato.pacote.nome')->title('Pacote'),
            Column::make('data_hora')->title('Data'),
            Column::make('data_hora_finalizacao')->title('Data Finalização'),
            Column::make('status')->title('Status'),
            Column::computed('action')->addClass('text-center')->title('Ações'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AgendamentosPacotes_' . date('YmdHis');
    }
}
