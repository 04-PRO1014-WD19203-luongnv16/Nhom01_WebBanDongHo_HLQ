<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm sản phẩm</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
  <script>
    $(document).ready(function () {
      function addVariantRow() {
        var newRow = `
          <tr>
            <td>
              <select name="size[]" id="">
                <?php foreach ($listkichthuoc as $key => $lSize) { ?>
                  <option value="<?=$lSize['id_kich_thuoc']?>"><?=$lSize['size']?></option>
                <?php } ?>
              </select>
            </td>
            <td>
              <input type="number" class="variantInput" name="gia_nhap[]" placeholder="Giá nhập" min="0">
            </td>
            <td>
              <input type="number" class="variantInput" name="gia_ban[]" placeholder="Giá bán" min="0">
            </td>
            <td>
              <input type="number" class="variantInput" name="so_luong[]" placeholder="Số lượng" min="0">
            </td>
            <td>
              <button type="button" class="removeVariantRow">Nhập lại</button>
            </td>
          </tr>
        `;
        $("#variantTable tbody").append(newRow);
      }

      // Add a variant row when the page loads
      addVariantRow();

      // Function to add a new variant row when the button is clicked
      $(document).on('click', '.addVariantRow', function () {
        addVariantRow();
      });

      // Assign click event to "Remove" buttons
      $(document).on("click", ".removeVariantRow", function () {
        $(this).closest("tr").remove();
      });
    });
  </script>
</head>
<body>
  <h2>Thêm sản phẩm</h2>
  <form action="trangchuadmin.php?act=themsanpham" method="post" enctype="multipart/form-data">
    <p>Tên sản phẩm</p>
    <input type="text" name="ten_san_pham" placeholder="Tên sản phẩm">
    <p>Thông tin sản phẩm</p>
    <input type="text" name="mo_ta" placeholder="Mô tả">
    <p>Ngày nhập</p>
    <input type="date" name="ngay_nhap" placeholder="Ngày nhập">
    <p>Thương hiệu</p>
    <select name="ten_danh_muc" id="">
      <?php foreach ($listdanhmuc as $key => $lSize) { ?>
        <option value="<?=$lSize['id_danh_muc']?>"><?=$lSize['ten_danh_muc']?></option>
      <?php } ?>
    </select>
    <p>Hình ảnh</p>
    <input type="file" name="hinh_anh" id="images" multiple>
    <table id="variantTable">
      <thead>
        <tr>
          <th>Size</th>
          <th>Giá nhập</th>
          <th>Giá bán</th>
          <th>Số lượng</th>
          <th>Quản lý</th>
        </tr>
      </thead>
      <tbody>
        <!-- Existing rows or leave it empty -->
      </tbody>
    </table>
    <br />
    <button type="button" class="addVariantRow">Thêm biến thể</button>
    <input type="submit" value="Thêm" name="btn_them">
  </form>
</body>
</html>
<style>
  tbody>tr>td>input{
    max-width: 200px;
  }
</style>