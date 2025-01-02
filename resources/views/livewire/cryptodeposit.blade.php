<div>
    <form wire:submit='save'>
        <div class="nk-block">
            <div class="form-group">
                <label class="form-label">Your Wallet Address</label>
                <div class="form-control-wrap">
                    <input type="text" wire:model.live='address' class="form-control form-control-lg" id="address"
                        placeholder="Enter your wallet address">
                </div>
                @error('address')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Upload Proof</label>
                <div class="form-control-wrap">
                    <input type="file" wire:model.live='file' class="form-control form-control-lg form-control-file ">
                </div>
                @error('file')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>
            <div class="buysell-field form-action text-center mt-3">
                <div>
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
                <div class="pt-3">
                    <a href="#" data-bs-dismiss="modal" class="link link-danger">Cancel</a>
                </div>
            </div>
        </div><!-- .nk-block -->
    </form>
</div>
@push('script')
    <script>
        $(document).ready(function() {
            $('#photo').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
                $('.message').addClass('d-none');
                $('.select').html('CHANGE');
            });
        });
    </script>
@endpush
