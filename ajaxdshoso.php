<?php
session_start();
include './Controller/cHosokhambenh.php';
$p = new controlhosokhambenh();
?>
<?php
if (isset($_POST['madonthuoc'])) {
    if ($_POST['madonthuoc'] == "themthuoc") {
        $tbldonthuoc=$p->getAllthuoc();
        // $donthuoc=mysqli_fetch_assoc($tbldonthuoc);
        ?>
        <span>Tên đơn thuốc</span>
        <input name="tendonthuoc" value="" class="form-control " required>
        
    
        <div id="answer">
          <div class="item">
            <label style="width:100%">
              <span>Thuốc 1</span>
              <select class="browser-default custom-select select2" name="tenthuoc[]" required >
					<option value="">----Chọn thuốc ----</option>';<?php
                        while ($row = mysqli_fetch_array($tbldonthuoc)) {?>
                            <option value="<?php echo $row['mathuoc'] ?>"><?php echo $row['tenthuoc'] ?></option>
                        <?php }?>
				</select><br><br>
              Số lượng: <input required class="input-qty" style="width:15%;height:30px;text-align:center;font-size:20px;" min="1" name="soluong[]" type="number" value="1">
              Loại: <input type="text" name="loai[]" style="height: 30px;" required>
              <br><br>
              Cách dùng: <textarea name="cachdung[]" class="form-control" required></textarea>
            </label>
            <a style="float:right" href="javascript:void(0)" class="del"> Xóa </a>
          </div>
          <div class="item">
          <label style="width:100%">
              <span>Thuốc 2</span>
              <select class="browser-default custom-select select2" name="tenthuoc[]" required >
					<option value="">----Chọn thuốc ----</option>
                    <?php 
                    $tbldonthuoc=$p->getAllthuoc();
                        while ($row = mysqli_fetch_array($tbldonthuoc)) {?>
                            <option value="<?php echo $row['mathuoc'] ?>"><?php echo $row['tenthuoc'] ?></option>
                        <?php }?>
				</select><br><br>
              Số lượng: <input required class="input-qty" style="width:15%;height:30px;text-align:center;font-size:20px;" min="1" name="soluong[]" type="number" value="1">
              Loại: <input type="text" name="loai[]" style="height: 30px;" required>
              <br><br>
              Cách dùng: <textarea name="cachdung[]" class="form-control" required></textarea>
            </label>
            <a style="float:right" href="javascript:void(0)" class="del"> Xóa </a>
          </div>
        </div>
        <center><a href="javascript:void(0)" id="add">Thêm</a></center>
        <?php
    } else {
        $madonthuoc = $_POST['madonthuoc'];
        $tbldonthuoc1 = $p->getdonthuoc_thuocvathuoc($madonthuoc);
        $output = "";
        $dem = 0;
        $output = "<input name='tenthuoc' value='' class='form-control' required>";
        //echo $row_cakham['macakham'];

        while ($row = mysqli_fetch_array($tbldonthuoc1)) {
            // $mathuoc=$row["mathuoc"];
            $tenthuoc = $row["tenthuoc"];
            $donvi = $row["donvi"];
            $soluong = $row["soluong"];
            $cachdung = $row["cachdung"];
            $dem++;
            $output = $dem . '<input name="tenthuoc" value="' . $tenthuoc . '" class="form-control " required readonly>Số lượng<input style="width:50px"  name="tenthuoc" value="' . $soluong . '" required readonly>' . $donvi . '<input class="form-control" name="tenthuoc" value="' . $cachdung . '" required readonly><br>';

            echo $output;
        }
    }
}
if (isset($_POST['madonthuoc1'])) {
    $tbltimkiem=$p->Timkiemtendonthuoc($_POST['madonthuoc1']);
    if(mysqli_num_rows($tbltimkiem)>0){
    while ($row = mysqli_fetch_array($tbltimkiem)) {
        // echo '<li></li>';       
        echo '<option value="'.$row["madonthuoc"].'">'.$row["tendonthuoc"].'</option>
        
        ';
    }
}
echo '<option value="themthuoc">-----Thêm thuôc----</option>';
}
// if(mysqli_num_rows($tbltimkiem)>0){
//     while ($row = mysqli_fetch_array($tbltimkiem)) {
                        
//         echo '<option value"'.$row["madonthuoc"].'">'.$row["tendonthuoc"].'</option>
        
//         ';
//     }
// }
// echo '<option value"themthuoc">-----Thêm thuôc----</option>';

?>

<script>
    $(document).ready(function() {
        // đưa con trỏ chuột vào text field đầu tiên
        $("#answer .item:first input[type='text']").focus();

        // hàm đếm số lượng text field đang có trên màn hình
        function countItem() {
            var items = $("#answer").children().length;
            return items;
        }

        // kích hoạt nút checkbox tương ứng khi nhập liệu cho text field
        // nếu xoá hết ký tự trong text field thì lại vô hiệu hoá checkbox
        $(document).on("keyup", "input[type='text']", function() {
            $(this).next("input[type='checkbox']").removeAttr("disabled");
            if ($(this).val() == "") {
                $(this).next("input[type='checkbox']").attr("disabled", "disabled").removeAttr("checked");
            }
        });

        // thêm text field, giới hạn chỉ có tối đa 10 cái
        $("#add").click(function() {
            var n = countItem();
            if (n == 10) {
                alert("Tối đa 10 loại thuốc");
            } else {
                n++;
                $("#answer").append("<div class='item'><label style='width:100%'><span>Thuốc " + n + "</span><select class='browser-default custom-select select2' name='tenthuoc[]' required ><option value=''>----Chọn thuốc ----</option><?php $tbldonthuoc=$p->getAllthuoc();while ($row = mysqli_fetch_array($tbldonthuoc)) {?><option value='<?php echo $row['mathuoc'] ?>'><?php echo $row['tenthuoc'] ?></option><?php }?></select><br><br>Số lượng: <input required class='input-qty' style='width:15%;height:30px;text-align:center;font-size:20px;' min='1' name='soluong[]' type='number' value='1'>Loại: <input required type='text' style='height: 30px;' name='loai[]'><br><br>Cách dùng: <textarea name='cachdung[]' class='form-control' required></textarea></label><a style='float:right' href='javascript:void(0)' class='del'> Xóa </a></div>");
            }
        });
        // xoá text filed khi click vào nút del ở dòng tương ứng
        // với text file đang có dữ liệu thì không cho xoá
        $(document).on("click", "a.del", function() {
            var n = countItem();
            if (n == 2) {
                alert("Nhập ít nhất 2 loại thuốc");
            } else {
                var check = $(this).siblings().find("input").val();
                // cách viết khác
                // var check = $(this).parent().find("label input").val();
                if (check == "") {
                    alert("Cannot delete answer field has content");
                } else {
                    $(this).parent().remove();
                    for (i = 0; i < n - 1; i++) {
                        $("#answer .item:eq(" + i + ") label span").html("Thuốc " + (parseInt(i) + 1));
                    }
                }
            }
        });

        // nếu lựa chọn checkbox thì đánh dấu đây là câu trả lời đúng
        // nếu bỏ chọn thì không đánh dấu nữa
        $(document).on("change", "input[type='checkbox']", function() {
            var v = $(this).prop("checked");
            if (v == true) {
                $(this).attr("checked", "checked");
            } else {
                $(this).removeAttr("checked");
            }
        });

        // đưa ra màn hình kết quả nhập liệu
        $("#create").bind("click", function() {
            var n = countItem();
            var result = "";
            var count = 0; // số lượng text field đã nhập liệu
            // ghi nhận nội dung các text field, lưu vào biến result
            for (i = 0; i < n; i++) {
                var text = $("#answer .item:eq(" + i + ") label input[type='text']").val();
                if (text != "") {
                    count++;
                    if ($("#answer .item:eq(" + i + ") label input[type='checkbox']").prop("checked") == true) text = text + " ---> right!";
                    result = result + "<p>Thuốc " + count + ": " + text + "</p>";
                }
            }

            // thêm class "blink_me" để tạo hiệu ứng nhấp nháy cho vùng div chứa kết quả khi nó hiển thị lần đầu tiên
            $("#result").addClass("blink_me");
            if (result == "") {
                // hiển thị thông báo tương ứng nếu chưa nhập liệu cho ít nhất 1 text field
                result = "You haven't input any answer yet!";
                $("#answer .item:first input").focus();
            } else {
                // đếm số câu trả lời đúng
                var ra = $("#answer input[checked='checked']").length;
                if (ra == 0) {
                    result = "Please choose at least one right answer";
                } else if (ra == count) {
                    result = "Number of right answers must less than number of all answers";
                } else {
                    // tất cả đều hợp lệ, hiển thị danh sách lựa chọn ra màn hình
                    $("#result").removeClass("blink_me");
                    $("input[type='checkbox']").attr("disabled", "disabled").removeAttr("checked");
                    $("input[type='text']").val("");
                }
            }
            // gán kết quả vào vùng div có id là "result"
            $("#result").html(result);
        });
    });
</script>
