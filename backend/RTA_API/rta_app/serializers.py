from rest_framework import serializers
from .models import Category, Condition, Product, Inventory, Branch


class CategorySerializer(serializers.ModelSerializer):
    class Meta:
        model = Category
        fields = ['id', 'name']


class ConditionSerializer(serializers.ModelSerializer):
    class Meta:
        model = Condition
        fields = ['id', 'name']


class ProductSerializer(serializers.ModelSerializer):
    branches = serializers.SerializerMethodField()

    class Meta:
        model = Product
        fields = ['id', 'sku', 'description', 'name', 'category', 'condition', 'branches', 'receiver']

    def get_branches(self, obj):
        inventory = Inventory.objects.filter(product_id=obj)
        data = {item.branch_id.id: item.quantity for item in inventory}
        return data


# class ProductsSerializer(serializers.ModelSerializer):
#     branches = serializers.SerializerMethodField()
#
#     class Meta:
#         model = Product
#         fields = '__all__'
#
#     def get_branches(self, obj):
#         inventory = Inventory.objects.filter(product_id=obj)
#         data = {item.branch_id.id: item.quantity for item in inventory}
#         return data


class ProductCreateSerializer(serializers.ModelSerializer):
    class Meta:
        model = Product
        fields = ['name', 'description', 'sku', 'category', 'condition', 'receiver']
        

class BranchSerializer(serializers.ModelSerializer):
    class Meta:
        model = Branch
        fields = '__all__'
        


