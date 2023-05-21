chcp 65001
xcopy "C:\Users\Vasilis\OneDrive\Documents\ΠΑΝΕΠΙΣΤΗΜΙΟ\Σχεδίαση εφαρμογών διαδικτύου\1η Εργασία\*" "C:\xampp\htdocs\webpage\" /s /i /d /y
del /q "C:\xampp\htdocs\webpage\sync.bat"
del /q "C:\xampp\htdocs\webpage\.gitignore"
del /s /q "C:\xampp\htdocs\webpage\.git"