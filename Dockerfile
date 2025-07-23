# ใช้ PHP เวอร์ชัน 8.2 พร้อมเซิร์ฟเวอร์ built-in
FROM php:8.2-cli

# คัดลอกไฟล์ทั้งหมดจากเครื่องเราเข้าไปใน container
COPY . /var/www/html

# ตั้งค่า working directory
WORKDIR /var/www/html

# เปิด built-in PHP server ที่ port 10000 (Render ใช้ port นี้)
CMD ["php", "-S", "0.0.0.0:10000"]
