from django.db import models


class Category(models.Model):
    name = models.CharField(max_length=255, unique=True)
    
    def __str__(self):
        return self.name
    

class Condition(models.Model):
    name = models.CharField(max_length=255)
    
    def __str__(self):
        return self.name
    

class Product(models.Model):
    sku = models.CharField(max_length=255)
    description = models.TextField()
    name = models.CharField(max_length=255)
    category = models.ForeignKey(Category, on_delete=models.CASCADE, related_name='category')
    condition = models.ForeignKey(Condition, on_delete=models.CASCADE, related_name='condition')
    receiver = models.CharField(max_length=255, null=True, blank=True, default=None)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)  # Automatically update this field on save

    def __str__(self):
        return f'{self.name} : {self.category}'


class Branch(models.Model):
    name = models.CharField(max_length=255)
    address = models.TextField()
    
    def __str__(self):
        return self.name


class Inventory(models.Model):
    product_id = models.ForeignKey(Product, on_delete=models.CASCADE, related_name='product_id')
    branch_id = models.ForeignKey(Branch, on_delete=models.CASCADE, related_name='branch_id')
    quantity = models.IntegerField()


class Picture(models.Model):
    product_id = models.ForeignKey(Product, on_delete=models.CASCADE, related_name='product')
    filename = models.CharField(max_length=255)
    content = models.BinaryField()



