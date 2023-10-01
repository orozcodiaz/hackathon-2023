from rest_framework import generics
from rest_framework.generics import ListAPIView
from rest_framework.response import Response
from .models import Category, Condition, Product, Inventory, Branch
from .serializers import CategorySerializer, ConditionSerializer, ProductSerializer, ProductCreateSerializer, BranchSerializer


class CategoryList(generics.ListAPIView):
    queryset = Category.objects.all()
    serializer_class = CategorySerializer


class ConditionList(generics.ListAPIView):
    queryset = Condition.objects.all()
    serializer_class = ConditionSerializer


class ProductList(generics.ListAPIView):
    queryset = Product.objects.all()
    serializer_class = ProductSerializer


class ProductsList(generics.ListAPIView):
    serializer_class = ProductSerializer

    def get_queryset(self):
        category_title = self.kwargs['category_title']
        return Product.objects.filter(category__name=category_title)


class ProductCreate(generics.CreateAPIView):
    queryset = Product.objects.all()
    serializer_class = ProductCreateSerializer


class ProductByBranch(generics.ListAPIView):
    serializer_class = ProductSerializer

    def get_queryset(self):
        branch_id = self.kwargs['branch_id']
        if branch_id is not None:
            return Product.objects.filter(
                product_id__in=Inventory.objects.filter(branch_id=branch_id).values_list('product_id', flat=True)
            )
        return Product.objects.none()  # Return an empty queryset if no branch_id is provided


class BranchListCreateView(generics.ListCreateAPIView):
    queryset = Branch.objects.all()
    serializer_class = BranchSerializer


