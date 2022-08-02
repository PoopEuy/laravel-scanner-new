<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Cell Serial</th>
            <th>Carton Serial</th>
            <th>OCVB</th>
            <th>IMPB</th>
            <th>BIN</th>
            <th>V_gr</th>
            <th>IR_gr</th>
            <th>Update</th>
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
                <td>
                    {{ $item->crtn_sern }}
                </td>
                <td>
                    {{ $item->ir_po }}
                </td>
                <td>
                    {{ $item->v_po }}
                </td>
                <td>
                    {{ $item->bin }}
                </td>
                <td>
                    {{ $item->v_gr }}
                </td>
                <td>
                    {{ $item->ir_gr }}
                </td>
                <td>
                    {{ $item->updated_at }}
                </td>
            </tr>
        @endforeach

    </tbody>

</table>
{{ $data_batt->links() }}
