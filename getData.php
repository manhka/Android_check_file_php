<?php
$connect = mysqli_connect("localhost","root","","studentdata");
mysqli_query($connect,"SET NAMES 'utf8'");
if($connect){
	$query= "SELECT * FROM sinhvien";
$data =mysqli_query($connect,$query);

// //1 tao class
class Student{
	function Student($id,$hoten, $namsinh ,$diachi){
		$this-> ID =$id;
		$this-> HoTen =$hoten;
		$this-> NamSinh =$namsinh;
		$this-> DiaChi =$diachi;
	}
}
// // //2 tao mang
$mangSV =array();

// //3 them phan tu vao mang
while ($row = mysqli_fetch_assoc($data)) {
	
	array_push($mangSV, new Student(
	$row['id']
	,$row['hoten'],$row['namsinh'],$row['diachi']
	)
);
}
echo json_encode($mangSV);
}else{
	echo "failed";
}
?>