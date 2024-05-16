@extends('admin.layouts.app')
@section('main')
    <section class="content">
        <div class="container-fluid">
            Submited Answer of Assignment
            <table id="showAss" style="width: 100% ">
                <thead>
                    <th>
                        Clg
                    </th>
                    <th>
                        Dep
                    </th>
                    <th>
                        Sem
                    </th>
                    <th>
                        Link
                    </th>
                </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>18</td>
                    <td>39</td>
                    <td>40</td>
                </tr>
            </tbody>
            </table>
        </div>
    </section>
@endsection
@section('script')

<script>
    $(document).ready(function(){
            $('#showAss').DataTable({
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
</script>

@endsection