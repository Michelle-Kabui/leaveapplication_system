            
            
            <div class="form-group mb-3">
                <label for="from_date">From Date</label>
                <input type="date" class="form-control @error('from_date') border border-danger @enderror" id="from_date" name="from_date">
            
                @error('from_date')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="to_date">To Date</label>
                <input type="date" class="form-control @error('to_date') border border-danger @enderror" id="to_date" name="to_date">
            
                @error('to_date')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="no_of_days">Number Of Days</label>
                <input type="number" class="form-control " id="no_of_days" name="no_of_days" value="
                <?php
                $date1=$_POST["from_date"];
                $date2=$_POST["to_date"];

                $diff = $date2->diff($date1);
                $days = $diff->format("%a");

                echo $days;

                
                ?>
                
                ">
            </div>