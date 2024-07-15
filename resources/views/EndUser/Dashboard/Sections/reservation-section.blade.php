<div class="tab-pane fade" id="v-pills-reservation" role="tabpanel" aria-labelledby="v-pills-reservation-tab">
    <div class="fp_dashboard_body">
        <h3>order list</h3>
        <div class="fp_dashboard_order">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr class="t_header">
                            <th>No</th>
                            <th>Reservation Id</th>
                            <th>Date/Time</th>
                            <th>Persons</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>
                                    <h5>{{ $loop->iteration }}</h5>
                                </td>
                                <td>
                                    <h5>#{{ $reservation->reservation_id }}</h5>
                                </td>
                                <td>
                                    <p>{{ date('F d, Y', strtotime($reservation->date))}} <br> {{ $reservation->reservationTime->start_time ." To ". $reservation->reservationTime->end_time }}</p>
                                </td>
                                <td>
                                    <p>{{ $reservation->persons }}</p>
                                </td>
                                <td>
                                    @if ($reservation->status === 'pending')
                                        <span class="active">Pending</span>
                                    @elseif ($reservation->status === 'completed')
                                        <span class="complete">completed</span>
                                    @elseif ($reservation->status === 'approved')
                                        <span class="active">approved</span>
                                    @elseif ($reservation->status === 'canceled')
                                        <span class="cancel">canceled</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
