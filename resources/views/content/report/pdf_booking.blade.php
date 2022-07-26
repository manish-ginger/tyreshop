@php
    use App\Models\Customervehicle;
    use App\Models\Customer;
    use App\Models\VehicleCategory;
    use App\Models\VehicleBrand;
    use App\Models\VehicleModel;
    use App\Models\Package;
    use App\Models\Feature;
    use App\Models\Coupon;
@endphp


<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 1px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>


<h3 class="card-title">Booking Report {{$file_name}} </h3>
<table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
    <thead>
    <tr>
        <th class="wd-5p border-bottom-0">SL</th>
        <th class="wd-40p border-bottom-0">Customer</th>
        <th class="wd-40p border-bottom-0">Number</th>
        <th class="wd-40p border-bottom-0">Category</th>
        <th class="wd-40p border-bottom-0">Brand</th>
        <th class="wd-40p border-bottom-0">Model</th>
        <th class="wd-40p border-bottom-0">Status</th>
        <th class="wd-40p border-bottom-0">Type</th>
        <th class="wd-40p border-bottom-0">Time</th>
        <th class="wd-40p border-bottom-0">Date</th>
        <th class="wd-40p border-bottom-0">Coupon</th>
        <th class="wd-40p border-bottom-0">Service</th>
        <th class="wd-40p border-bottom-0">Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rows_services as $row)
        @php
            $customervehicle_data=Customervehicle::where('vehicle_number','=',$row->vehicle_number)->get();
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @php
                    $data =Customer::where('id',$customervehicle_data[0]->customer_id)->get();
                         if(isset($data[0]->name)){echo $data[0]->name; }
                @endphp
            </td>
            <td>{{ $row->vehicle_number }}</td>
            <td>
                @php
                    $data =VehicleCategory::where('id',$customervehicle_data[0]->vehicle_category)->get();
                         if(isset($data[0]->name)){echo $data[0]->name; }
                @endphp
            </td>
            <td>
                @php
                    $data =VehicleBrand::where('id',$customervehicle_data[0]->brand)->get();
                         if(isset($data[0]->name)){echo $data[0]->name; }
                @endphp
            </td>
            <td>
                @php
                    $data =VehicleModel::where('id',$customervehicle_data[0]->model)->get();
                         if(isset($data[0]->name)){echo $data[0]->name; }
                @endphp
            </td>
            <td>
                @if($row->status==0) Waiting @endif
                @if($row->status==1) Vehicle Received @endif
                @if($row->status==2) Processing @endif
                @if($row->status==3) Finished @endif
            </td>
            <td>
                @if($row->booking_type==0) Pre Booked @endif
                @if($row->booking_type==1) Direct @endif
            </td>
            <td>{{ $row->time }}</td>
            <td>{{ $row->date }}</td>
            <td>
                @php
                    $data =Feature::where('id',$row->service_id)->get();
                         if(isset($data[0]->coupon)){
                             $coupon_data =Coupon::where('id',$data[0]->coupon)->get();
                             if(isset($coupon_data[0]->code)){echo $coupon_data[0]->code; }
                          }
                @endphp
            </td>
            <td>
                @php
                    $data =Feature::where('id',$row->service_id)->get();
                         if(isset($data[0]->feature_name)){echo $data[0]->feature_name; }
                @endphp
            </td>
            <td>
                @php
                    $data =Feature::where('id',$row->service_id)->get();
                         if(isset($data[0]->actual_price)){echo $data[0]->discounted_price;
                         }
                @endphp
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
