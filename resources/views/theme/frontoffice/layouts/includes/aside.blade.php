<aside id="right-sidebar-nav">
    <ul id="chat-out" class="side-nav rightside-navigation">
        <li class="li-hover">
            <div class="row">
                <div class="col s12 border-bottom-1 mt-5">
                    <ul class="tabs">
                        <li class="tab col s4">
                            <a href="#activity" class="active">
                                <span class="material-icons">graphic_eq</span>
                            </a>
                        </li>
                        <li class="tab col s4">
                            <a href="#chatapp">
                                <span class="material-icons">face</span>
                            </a>
                        </li>
                        <li class="tab col s4">
                            <a href="#settings">
                                <span class="material-icons">settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="settings" class="col s12">
                    <h6 class="mt-5 mb-3 ml-3">GENERAL SETTINGS</h6>
                    <ul class="collection border-none">
                        <li class="collection-item border-none">
                            <div class="m-0">
                                <span class="font-weight-600">Notifications</span>
                                <div class="switch right">
                                    <label>
                                        <input checked type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </li>
                        <li class="collection-item border-none">
                            <div class="m-0">
                                <span class="font-weight-600">Show recent activity</span>
                                <div class="switch right">
                                    <label>
                                        <input checked type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </li>
                        <li class="collection-item border-none">
                            <div class="m-0">
                                <span class="font-weight-600">Notifications</span>
                                <div class="switch right">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </li>
                        <li class="collection-item border-none">
                            <div class="m-0">
                                <span class="font-weight-600">Show recent activity</span>
                                <div class="switch right">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </li>
                        <li class="collection-item border-none">
                            <div class="m-0">
                                <span class="font-weight-600">Show your emails</span>
                                <div class="switch right">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </li>
                        <li class="collection-item border-none">
                            <div class="m-0">
                                <span class="font-weight-600">Show Task statistics</span>
                                <div class="switch right">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </li>
                    </ul>
                </div>
                <div id="chatapp" class="col s12">
                    <div class="collection border-none">
                        <h6 class="mt-5 mb-3 ml-3">Salas de chat</h6>
                        @if(auth()->user()->boards)
                            @foreach(auth()->user()->boards as $board)
                                @foreach($board->users as $user  )
                                    @if($user->id != auth()->user()->id)
                                        <a href="{{route('chat.with', $user)}}" class="collection-item avatar border-none">
                                            <img src="{{asset($user->profile_path)}} " alt="" class="circle cyan">
                                            <span class="line-height-0">{{$user->name}} </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">5.00 AM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Thank you </p>
                                        </a>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
                <div id="activity" class="col s12">
                    <h6 class="mt-5 mb-3 ml-3">RECENT ACTIVITY</h6>
                    <div class="activity">
                        <div class="col s3 mt-2 center-align recent-activity-list-icon">
                            <i class="material-icons white-text icon-bg-color deep-purple lighten-2">add_shopping_cart</i>
                        </div>
                        <div class="col s9 recent-activity-list-text">
                            <a href="#" class="deep-purple-text medium-small">just now</a>
                            <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                        </div>
                        <div class="recent-activity-list chat-out-list row mb-0">
                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                <i class="material-icons white-text icon-bg-color cyan lighten-2">airplanemode_active</i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#" class="cyan-text medium-small">Yesterday</a>
                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row mb-0">
                            <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                                <i class="material-icons white-text icon-bg-color green lighten-2">settings_voice</i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#" class="green-text medium-small">5 Days Ago</a>
                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row mb-0">
                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                <i class="material-icons white-text icon-bg-color amber lighten-2">store</i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#" class="amber-text medium-small">1 Week Ago</a>
                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list row">
                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                <i class="material-icons white-text icon-bg-color deep-orange lighten-2">settings_voice</i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row mb-0">
                            <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                                <i class="material-icons white-text icon-bg-color brown lighten-2">settings_voice</i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#" class="brown-text medium-small">1 Month Ago</a>
                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row mb-0">
                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                <i class="material-icons white-text icon-bg-color deep-purple lighten-2">store</i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list row">
                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                <i class="material-icons white-text icon-bg-color grey lighten-2">settings_voice</i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#" class="grey-text medium-small">1 Year Ago</a>
                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>

</aside>
