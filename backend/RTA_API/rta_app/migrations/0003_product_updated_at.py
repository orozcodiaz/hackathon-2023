# Generated by Django 4.2.3 on 2023-09-30 23:58

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ("rta_app", "0002_product_receiver_alter_product_created_at"),
    ]

    operations = [
        migrations.AddField(
            model_name="product",
            name="updated_at",
            field=models.DateTimeField(auto_now=True),
        ),
    ]