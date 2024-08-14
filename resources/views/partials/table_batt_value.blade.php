<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Cell Serial</th>
            {{-- <th>Carton Serial</th> --}}
            <th>BIN</th>
            <th>IR_po (uOhm)</th>
            <th>IR_gr</th>
            <th>Delta IR</th>
            <th>IR_Status</th>
            <th>V_po (mV)</th>
            {{-- <th>K (mV/Mth)</th> --}}
            <th>V_gr</th>
            <th>Delta mV</th>
            <th>V_Status</th>
            <th>Frame</th>
            <th>PO Code</th>
            <th>D Test</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data_batt as $index => $item)
            <tr>
                <td>
                    {{ $data_batt->firstItem() + $index }}
                </td>
                <td>
                    {{ $item->cell_sern }}
                </td>
                {{-- <td>
                    {{ $item->crtn_sern }}
                </td> --}}
                <td>
                    {{ $item->bin }}
                </td>
                <td>
                    {{ $item->ir_po }}
                </td>
                <td>
                    {{ $item->ir_gr }}
                </td>
                <td>
                    {{ $item->delta_ir }}
                </td>
                <td>
                    {{ $item->ir_status }}
                </td>
                <td>
                    {{ $item->v_po }}
                </td>
                {{-- <td>
                    {{ $item->k }}
                </td> --}}
                <td>
                    {{ $item->v_gr }}
                </td>
                <td>
                    {{ $item->delta_mv }}
                </td>
                <td>
                    {{ $item->v_status }}
                </td>
                <td>
                    {{ $item->frame_sn }}
                </td>
                <td>
                    {{ $item->po }}
                </td>
                <td>
                    {{ $item->d_test }}
                </td>
            </tr>
        @endforeach

    </tbody>

</table>
{{ $data_batt->links() }}
