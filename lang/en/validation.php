<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Xin lỗi, :attribute phải được chấp nhận.',
    'accepted_if' => 'Xin lỗi, :attribute phải được chấp nhận khi :other là :value.',
    'active_url' => 'Xin lỗi, :attribute phải là một URL hợp lệ.',
    'after' => 'Xin lỗi, :attribute phải là ngày sau :date.',
    'after_or_equal' => 'Xin lỗi, :attribute phải lớn hơn hoặc bằng ngày :date.',
    'alpha' => 'Xin lỗi, :attribute chỉ chứa chữ.',
    'alpha_dash' => 'Xin lỗi, :attribute chỉ chứa chữ, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => 'Xin lỗi, :attribute chỉ chứa chữ và số.',
    'array' => 'Xin lỗi, :attribute phải là một mảng.',
    'ascii' => 'Xin lỗi, :attribute chỉ được chứa các ký tự trong bảng mã ASCII và ký hiệu.',
    'before' => 'Xin lỗi, :attribute phải là ngày trước :date.',
    'before_or_equal' => 'Xin lỗi, :attribute phải bé hơn hoặc bằng ngày :date.',
    'between' => [
        'array' => 'Xin lỗi, :attribute phải chứa từ :min đến :max phần tử.',
        'file' => 'Xin lỗi, :attribute phải có kích thước từ :min đến :max kilobytes.',
        'numeric' => 'Xin lỗi, :attribute phải nằm trong khoảng từ :min đến :max.',
        'string' => 'Xin lỗi, :attribute phải có từ :min đến :max ký tự.',
    ],
    'boolean' => 'Xin lỗi, :attribute phải là "True" hoặc "False".',
    'can' => 'Xin lỗi, :attribute chứa giá trị không hợp lệ.',
    'confirmed' => 'Xin lỗi, :attribute không khớp.',
    'current_password' => 'Xin lỗi, mật khẩu không chính xác.',
    'date' => 'Xin lỗi, :attribute phải là ngày hợp lệ.',
    'date_equals' => 'Xin lỗi, :attribute phải bằng ngày :date.',
    'date_format' => 'Xin lỗi, :attribute không đúng định dạng :format.',
    'decimal' => 'Xin lỗi, :attribute phải có :decimal số thập phân.',
    'declined' => 'Xin lỗi, :attribute phải bị từ chối.',
    'declined_if' => 'Xin lỗi, :attribute phải bị từ chối vì :other là :value.',
    'different' => 'Xin lỗi, :attribute và :other phải khác nhau.',
    'digits' => 'Xin lỗi, :attribute phải có :digits chữ số.',
    'digits_between' => 'Xin lỗi, :attribute phải có từ :min đến :max chữ số.',
    'dimensions' => 'Xin lỗi, :attribute có kích thước ảnh không phù hợp.',
    'distinct' => 'Xin lỗi, :attribute có giá trị trùng lặp.',
    'doesnt_end_with' => 'Xin lỗi, :attribute không được kết thúc bằng những giá trị sau: :values.',
    'doesnt_start_with' => 'Xin lỗi, :attribute không được bắt đầu bằng những giá trị sau: :values.',
    'email' => 'Xin lỗi, :attribute phải là địa chỉ Email hợp lệ.',
    'ends_with' => 'Xin lỗi, :attribute phải kết thúc bằng một trong những giá trị sau: :values.',
    'enum' => 'Xin lỗi, thuộc tính :attribute được chọn không hợp lệ.',
    'exists' => 'Xin lỗi, thuộc tính :attribute được chọn không hợp lệ.',
    'file' => 'Xin lỗi, :attribute phải là một tập tin.',
    'filled' => 'Xin lỗi, :attribute phải có giá trị.',
    'gt' => [
        'array' => 'Xin lỗi, :attribute phải có nhiều hơn :value phần tử.',
        'file' => 'Xin lỗi, :attribute phải có kích thước lớn hơn :value kilobytes.',
        'numeric' => 'Xin lỗi, :attribute phải lớn hơn :value.',
        'string' => 'Xin lỗi, :attribute phải có nhiều hơn :value ký tự.',
    ],
    'gte' => [
        'array' => 'Xin lỗi, :attribute phải có :value phần tử hoặc nhiều hơn.',
        'file' => 'Xin lỗi, :attribute có kích thước tối thiểu: :value kilobytes.',
        'numeric' => 'Xin lỗi, :attribute phải lớn hơn hoặc bằng :value.',
        'string' => 'Xin lỗi, :attribute phải có ít nhất :value ký tự.',
    ],
    'image' => 'Xin lỗi, :attribute phải là một hình ảnh.',
    'in' => 'Xin lỗi, thuộc tính :attribute được chọn không hợp lệ.',
    'in_array' => 'Xin lỗi, :attribute phải tồn tại trong :other.',
    'integer' => 'Xin lỗi, :attribute phải là số nguyên.',
    'ip' => 'Xin lỗi, :attribute phải là địa chỉ IP hợp lệ.',
    'ipv4' => 'Xin lỗi, :attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => 'Xin lỗi, :attributephải là địa chỉ IPv6 hợp lệ.',
    'json' => 'Xin lỗi, :attribute phải là một chuỗi JSON hợp lệ.',
    'lowercase' => 'Xin lỗi, :attribute phải là chữ thường.',
    'lt' => [
        'array' => 'Xin lỗi, :attribute phải có ít hơn :value phần tử.',
        'file' => 'Xin lỗi, :attribute yêu cầu kích thước nhỏ hơn: :value kilobytes.',
        'numeric' => 'Xin lỗi, :attribute phải nhỏ hơn: :value.',
        'string' => 'Xin lỗi, :attribute phải có ít hơn: :value ký tự.',
    ],
    'lte' => [
        'array' => 'Xin lỗi, :attribute không thể có nhiều hơn :value phần tử.',
        'file' => 'Xin lỗi, :attribute có kích thước tối thiểu: :value kilobytes.',
        'numeric' => 'Xin lỗi, :attribute phải nhỏ hơn hoặc bằng :value.',
        'string' => 'Xin lỗi, :attribute phải có ít hơn hoặc bằng: :value ký tự.',
    ],
    'mac_address' => 'Xin lỗi, :attribute phải là địa chỉ MAC hợp lệ.',
    'max' => [
        'array' => 'Xin lỗi, :attribute không được có nhiều hơn :max phần tử.',
        'file' => 'Xin lỗi, :attribute không được lớn hơn: :max kilobytes.',
        'numeric' => 'Xin lỗi, :attribute không được lớn hơn :max.',
        'string' => 'Xin lỗi, :attribute không được có nhiều hơn :max ký tự.',
    ],
    'max_digits' => 'Xin lỗi, :attribute không được có nhiều hơn :max chữ số.',
    'mimes' => 'Xin lỗi, :attribute phải là một tập tin có định dạng: :values.',
    'mimetypes' => 'Xin lỗi, :attribute phải là một tập tin có định dạng: :values.',
    'min' => [
        'array' => 'Xin lỗi, :attribute phải có ít nhất :min phần tử.',
        'file' => 'Xin lỗi, :attribute phải có ít nhất :min kilobytes.',
        'numeric' => 'Xin lỗi, :attribute phải có ít nhất :min.',
        'string' => 'Xin lỗi, :attribute phải có ít nhất :min ký tự.',
    ],
    'min_digits' => 'Xin lỗi, :attribute phải có ít nhất :min chữ số.',
    'missing' => 'Xin lỗi, :attribute bị thiếu.',
    'missing_if' => 'Xin lỗi, :attribute bị thiếu vì :other là :value.',
    'missing_unless' => 'Xin lỗi, :attribute bị thiếu trừ khi :other là :values.',
    'missing_with' => 'Xin lỗi, :attribute bị thiếu khi :values hiện diện.',
    'missing_with_all' => 'Xin lỗi, :attribute bị thiếu khi :values hiện diện.',
    'multiple_of' => 'Xin lỗi, :attribute phải là bội số của :value.',
    'not_in' => 'Xin lỗi, thuộc tính :attribute được chọn không hợp lệ.',
    'not_regex' => 'Xin lỗi, :attribute có định dạng không hợp lệ.',
    'numeric' => 'Xin lỗi, :attribute phải là một số.',
    'password' => [
        'letters' => 'Xin lỗi, :attribute ít nhất phải có một chữ.',
        'mixed' => 'Xin lỗi, :attribute phải có ít nhất một chữ viết hoa và một chữ cái viết thường.',
        'numbers' => 'Xin lỗi, :attribute phải có ít nhất một số.',
        'symbols' => 'Xin lỗi, :attribute phải có ít nhất một ký tự đặc biệt.',
        'uncompromised' => 'Xin lỗi, dường như :attribute đã xuất hiện trong một vụ rò rỉ dữ liệu. Vui lòng chọn một :attribute khác.',
    ],
    'present' => 'Xin lỗi, :attribute phải hiện diện.',
    'prohibited' => 'Xin lỗi, :attribute bị cấm.',
    'prohibited_if' => 'Xin lỗi, :attribute bị cấm khi :other là :value.',
    'prohibited_unless' => 'Xin lỗi, :attribute bị cấm trừ khi :other là :values.',
    'prohibits' => 'Xin lỗi, :attribute cấm :other hiện diện.',
    'regex' => 'Xin lỗi, :attribute có định dạng không hợp lệ.',
    'required' => 'Xin lỗi, :attribute là bắt buộc.',
    'required_array_keys' => 'Xin lỗi, :attribute phải chứa các mục nhập cho: :values.',
    'required_if' => 'Xin lỗi, :attribute là bắt buộc khi :other là :value.',
    'required_if_accepted' => 'Xin lỗi, :attribute được yêu cầu khi :other được chấp nhận.',
    'required_unless' => 'Xin lỗi, :attribute là bắt buộc trừ khi :other là :values.',
    'required_with' => 'Xin lỗi, :attribute bắt buộc khi :values hiện diện.',
    'required_with_all' => 'Xin lỗi, :attribute được yêu cầu khi :values hiện diện.',
    'required_without' => 'Xin lỗi, :attribute bắt buộc khi :values không hiện diện.',
    'required_without_all' => 'Xin lỗi, :attribute được yêu cầu khi không có :values nào hiện diện.',
    'same' => 'Xin lỗi, :attribute và :other phải khớp.',
    'size' => [
        'array' => 'Xin lỗi, :attribute phải chứa :size phần tử.',
        'file' => 'Xin lỗi, :attribute phải có kích thước :size kilobytes.',
        'numeric' => 'Xin lỗi, :attribute phải là :size.',
        'string' => 'Xin lỗi, :attribute phải có :size ký tự.',
    ],
    'starts_with' => 'Xin lỗi, :attribute phải bắt đầu bằng một trong những giá trị sau: :values.',
    'string' => 'Xin lỗi, :attribute phải là một chuỗi.',
    'timezone' => 'Xin lỗi, :attribute phải là múi giờ hợp lệ.',
    'unique' => 'Xin lỗi, :attribute đã tồn tại.',
    'uploaded' => 'Xin lỗi, :attribute tải lên thất bại.',
    'uppercase' => 'Xin lỗi, :attribute phải là chữ hoa.',
    'url' => 'Xin lỗi, :attribute phải là một URL hợp lệ.',
    'ulid' => 'Xin lỗi, :attribute phải là một ULID hợp lệ.',
    'uuid' => 'Xin lỗi, :attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
