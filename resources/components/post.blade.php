<div class="col">
    <div class="card">
        <div class="card-body">
            <div class="card-image-background">
                {{-- <img src="src/img/vapor.svg" class="card-image"> --}}
            </div>
            <p 
                class="card-title mb-0"
            >
                {{ $title }}
            </p>
            <p class="card-text">
                {{ $content }}
            </p>
        </div>
    </div>
</div>

@push('style')
    <style>
        .card{
            border: 0;
            border-radius: 0;
            box-shadow: 0 20px 30px -16px rgba(9, 9, 16, 0.1);
            max-width: 300px;
        }

        .card-title{
            font-size: 16px;
            font-weight: 400;
        }

        .card-text{
            font-size: 14px;
            font-weight: 300;
        }

        .card-image-background{
            width: 50px;
            height: 50px;
            text-align: center;
            float: left;
            margin-right: 10px;
            
            background-color: #24C4F2;
        }

        .card-image{
            display: flex;
            margin: 0 auto;
            height: 100%;
            width: 0%; /* 75% */
        }

        .card:hover{
            cursor: pointer;
            transform: scale(1.05);
            transition: 200ms;
        }

        .card-group{
            /* box-shadow: 0 20px 30px -16px rgba(9, 9, 16, 0.1); */
            width: 1000px;
        }
    </style>
@endpush