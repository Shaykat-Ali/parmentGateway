<!-- Modal -->
<div class="modal fade" data-value="affiliate-modal-{{ $user->id }}" id="affiliate-modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Assgin Affiliate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('assign.affiliate',$user->id) }}" method="GET">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12 text-left">
              <lable>Affiliate<span class="text-danger">*</span></lable>
              <select name="affiliate_id" class=" form-control select2" required>
                 <option value="">Select Affiliate</option>
                 @foreach($affiliates as $affiliate)
                 <option value="{{ $affiliate->id }}" {{ $user->affiliate_id ==  $affiliate->id ? 'selected' : '' }}>{{ $affiliate->name }}</option>
                 @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
