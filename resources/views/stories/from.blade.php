<div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" 
            placeholder="title" value= "{{ old('title', $story->title )}} ">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
            @enderror
           
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea  class="form-control @error('body') is-invalid @enderror "  name="body" >
            {{ old('body',$story->body)}}
            </textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control @error('type') is-invalid @enderror ">
                <option value="">--Select-- </option>
                <option value="short" {{ 'short' == old('type',$story->type) ? 'selected':''}} >Short</option>
                <option value="long" {{ 'long' == old('type',$story->type) ? 'selected':''}}>Long </option>
            </select>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <legend><h6>Status</h6></legend>
            <div class="from-check @error('status') is-invalid @enderror">
            <input type="radio" class="form-check-input" name="status" value="1" {{ '1' == old('status',$story->status)? 'checked':''}}>
            <level for ="active" class="form-check-level" > Yes</label>            
            </div>

            <div class="from-check">
            <input type="radio" class="form-check-input" name="status" value="0" {{ '0' == old('status',$story->status )? 'checked':''}}>
            <level for ="active" class="form-check-level" > No</label>            
            </div>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
            @enderror
        </div>




  <br>