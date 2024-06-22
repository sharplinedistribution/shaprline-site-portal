<div class="row">
    <div class="col-md-12">
        <h3 style="color:var(--primary)">Modify Shared Royalties</h3>
    </div>
</div>
<div class="row mt-2" >
    <input type="hidden" id="royal_split_id" value="{{$royalSplit->id}}">
    <div class="col-md-5">
        <label for="" class="text-white">Name</label>
        <input name="name[]" id="edit_name" type="text" class="form-control" placeholder="John Doe" value="{{$royalSplit->name}}">
    </div>
    <div class="col-md-5">
        <label for="" class="text-white">Email</label>
        <input name="email[]" id="edit_email" type="email" class="form-control" placeholder="john.doe@example.com" value="{{$royalSplit->email}}" >
    </div>
    <div class="col-md-2">
        <label for="" class="text-white">Split</label>
        <input name="split[]"  id="edit_split" type="text" class="form-control" placeholder="%" onfocusout="splitPercentage($(this))"  data-count="{{$count}}"  value="{{$royalSplit->share}}">
    </div>
</div>
<div class="row">
  <div class="col-md-12 mt-3" >
    <div style="float:right">
        <button type="button" class="btn btn-primary bg-dark text-white" onClick="closeModalAndUpdateLoader($(this))">Cancel</button>&nbsp;
        <button type="button" onClick="modifySplitShare($(this))" class="btn btn-primary">Modify</button>
    </div>
  </div>
</div>