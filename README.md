# Darkwater_Fins
A website is used to sell aquariums and services.
DF-12 Feat addUpdateProfile
# The princible of commit
commit message: <key> <type>: <description>
<key>
Example: DF-1 (key theo issue trên Jira, phải viết hoa)
<type>:
feat: (Feature): Thêm tính năng mới.
fix: (Bug fix): Sửa lỗi.
fefactor: (Cải tiến mã mà không thay đổi hành vi).
fest: (Thêm/sửa test cases).
fhore: (Công việc không ảnh hưởng đến logic, như cấu hình).
docs: Những thay đổi liên quan đến sửa đổi document trong repo.
style: Những chỉnh sửa về UI
<description>:
starting a verb such as add/fix/update/remove/refactor/improve/optimize/...

# The principle of branch
branch name: <key>-<branch-name>
<branch-name>: feat/<feat-name>


# The princible of make files' name
Controller/Model: tên lớp + Controller (Viết hoa chữ cái đầu của tên lớp)
Model:m tên lớp + Model (Viết hoa chữ cái đầu của tên lớp + tên lớp theo entity của database)
View: tên page + View

# Includes

Luôn luôn thêm file "./app/public/css/common.css" & "./app/components/bootStrapAndFontLink.php" vào view files