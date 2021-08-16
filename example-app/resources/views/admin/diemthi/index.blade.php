<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tra cứu điểm thi THPT 2021

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
            <form action="{{ route('search.diemthi') }}" method="GET">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Số báo danh</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="query">

                </div>

                <button type="submit" class="btn btn-primary">Tra cứu</button>
            </form>

                        <br>
                        <br>
                        <br>
                        @if(isset($diem))
                            <table class="table">
                                <thead>
                                <tr>

                                    <th scope="col">Toán</th>
                                    <th scope="col">Văn</th>
                                    <th scope="col">Ngoại Ngữ</th>
                                    <th scope="col">Vật Lý</th>
                                    <th scope="col">Hóa Học</th>
                                    <th scope="col">Sinh Học</th>
                                    <th scope="col">Lịch Sử</th>
                                    <th scope="col">Địa Lý</th>
                                    <th scope="col">Giáo Dục CD</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($diem) > 0)
                                    @foreach($diem as $diems)
                                        <tr>
                                            <td>{{ $diems->toan }}</td>
                                            <td>{{ $diems->van }}</td>
                                            <td>{{ $diems->ngoai_ngu }}</td>
                                            <td>{{ $diems->vat_ly }}</td>
                                            <td>{{ $diems->hoa_hoc }}</td>
                                            <td>{{ $diems->sinh_hoc }}</td>
                                            <td>{{ $diems->lich_su }}</td>
                                            <td>{{ $diems->dia_ly }}</td>
                                            <td>{{ $diems->GDCD }}</td>


                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>Không có kết quả!</td></tr>
                                @endif


                                </tbody>
                            </table>

                        @endif






                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
