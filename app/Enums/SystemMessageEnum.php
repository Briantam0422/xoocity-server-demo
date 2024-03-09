<?php
namespace App\Enums;

enum SystemMessageEnum:string{
    case Missing = 'Missing';
    case ValidationError = 'Validation Error';
    case SystemError = 'System Error';
    case Unauthorized = 'Unauthorized';
    case UpdateSuccess = 'Updated Successfully';
    case NotFound = 'Not Found';
    case UserNotFound = 'User Not Found';
    case ItemNotFound = 'Item Not Found';
    case InputCantBeNull = 'Input can\'t be null';
    case RegisterSuccessfully = 'Register Successfully';
    case UploadFileFail = 'Upload File Fail';
    case CreateSuccessfully = 'Create Successfully';
    case EditSuccessfully = 'Edited Successfully';
    case DeleteSuccessfully = 'Deleted Successfully';
    case SearchSuccessfully = 'Search Successfully';
    case GetSuccessfully = 'Get Successfully';
    case SentSuccessfully = 'Sent Successfully';
    case ResetSuccessfully = 'Reset Successfully';
    case MarkedSuccessfully = 'Marked Successfully';
    case AnsweredSuccessfully = 'Answered and Next Question';

    case TypeMustBeArray = 'Type must be array';
}
