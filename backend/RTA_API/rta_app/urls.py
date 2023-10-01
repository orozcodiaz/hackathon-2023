from django.urls import path
from .views import CategoryList, ConditionList, ProductList, ProductCreate, ProductByBranch, BranchListCreateView, ProductsList

urlpatterns = [
    path('api/v1/categories', CategoryList.as_view(), name='categories-list'),
    path('api/v1/conditions', ConditionList.as_view(), name='conditions-list'),
    path('api/v1/branches/', BranchListCreateView.as_view(), name='branches-list-create'),
    path('api/v1/products/get', ProductList.as_view(), name='products-list'),
    path('api/v1/products/create', ProductCreate.as_view(), name='product-create'),
    path('api/v1/products/getByBranchId/<int:branch_id>/', ProductByBranch.as_view(), name='product-by-branch'),
    path('api/v1/products/category/<str:category_title>', ProductsList.as_view(), name='category_title'),
]
