<div class="settings text-center">
    <div class="row justify-content-center">
        <div class="form-group co-md-6">
            <form action="">
                <label for="Public">نوع حساب کاربری</label>
                <select class="custom-select" id="Public" required>
                    <option value="0">عمومی</option>
                    <option value="1">خصوصی</option>
                </select>
            </form>
        </div>
        <div class="form-group col-md-6">
            <label for="DeleteAccount">حذف حساب کاربری</label><br>
            <button class="btn btn-outline-danger" id="DeleteAccount">
                <div class="fa fa-trash"></div> حذف
            </button>
        </div>
    </div>
</div>
<script>
	$('#DeleteAccount').click(() =>{
		console.log('test')
		$.post(baseUrl+'dashboard/Delete_Account' )
	})
</script>
