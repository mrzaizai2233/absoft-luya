<?php
use luya\admin\helpers\Angular;
?>
<form ng-submit="submit()" class="form-horizontal" role="form">
    <div class="form-group">
        <legend>{{page_title}}</legend>

    </div>

    <!--    <div class="form-group">-->
    <!--        <label for="attribute_set" class="col-sm-2 control-label">Attribute Set</label>-->
    <!--        <div class="col-sm-10 col-md-10">-->
    <!--            <select class="form-control" id="attribute_set" ng-model="product.attribute_set_id">-->
    <!--                <option ng-repeat="attribute_set in attribute_sets" value="{{attribute_set.attribute_set_id}}">{{attribute_set.attribute_set_name}}</option>-->
    <!--            </select>-->
    <!--        </div>-->
    <!--    </div>-->


    <div class="form-group">
        <label for="name" class="col-sm-2 col-md-2 control-label">Default Label</label>
        <div class="col-sm-10 col-md-10">
            <input type="text" class="form-control" id="name" ng-model="product.name" placeholder="Name">
        </div>
    </div>

    <div class="form-group">
        <label for="visibility" class="col-sm-2 control-label">Input Type</label>
        <div class="col-sm-4 col-md-4">
            <select class="form-control" id="visibility" ng-model="product.visibility">
                <option value="1">Not Visible Individually</option>
                <option value="2">Catalog</option>
                <option value="3">Search</option>
                <option value="4">Catalog, Search</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="price" class="col-sm-2 col-md-2 control-label">Price</label>
        <div class="col-sm-10 col-md-10">
            <input type="text" class="form-control" id="price" ng-model="product.price" placeholder="Price">
        </div>
    </div>

    <div class="form-group">
        <label for="weight" class="col-sm-2 col-md-2 control-label">Weight</label>
        <div class="col-sm-10 col-md-10">
            <input type="text" class="form-control" id="weight" ng-model="product.weight" placeholder="Weight">
        </div>
    </div>

    <div class="form-group">
        <label for="visibility" class="col-sm-2 control-label">Visibility</label>
        <div class="col-sm-4 col-md-4">
            <select class="form-control" id="visibility" ng-model="product.visibility">
                <option value="1">Not Visible Individually</option>
                <option value="2">Catalog</option>
                <option value="3">Search</option>
                <option value="4">Catalog, Search</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-4 col-md-4">
            <select class="form-control" id="status" ng-model="product.status">
                <option value="0">Out stock</option>
                <option value="1">In stock</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="short-description" class="col-sm-2 control-label">Short Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="short-description" ng-model="product.short_description" placeholder=""></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" ng-model="product.description" placeholder=""></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
