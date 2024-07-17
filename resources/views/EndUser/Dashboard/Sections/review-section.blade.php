                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="fp_dashboard_body dashboard_review">
                                        <h3>review</h3>
                                        <div class="fp__review_area">
                                            <div class="fp__comment pt-0 mt_20">
                                                @foreach ($reviews as $review)
                                                    <div class="fp__single_comment m-0 border-0">
                                                        <img src="{{ asset($review->user->avatar) }}" alt="review"
                                                            class="img-fluid">
                                                        <div class="fp__single_comm_text">
                                                            <h3><a
                                                                    href="javascript:;">{{ $review->user->name }}</a><span>
                                                                    {{ date('d F Y', strtotime($review->created_at)) }}
                                                                    <br>
                                                                </span>
                                                            </h3>
                                                            <span class="rating">
                                                                @for ($i = 1; $i <= $review->rating; $i++)
                                                                    <i class="fas fa-star"></i>
                                                                @endfor
                                                            </span>
                                                            <p>{{ $review->review }}</p>
                                                            @if ($review->status == 0)
                                                                <span class="status inactive">pending</span>
                                                            @else
                                                                <span class="status active">approved</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @if (count($reviews) == 0)
                                                    <h5 class="mt-4">No Reviews Added</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
