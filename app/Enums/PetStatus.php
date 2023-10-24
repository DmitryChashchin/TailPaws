<?php


enum PetStatus: string
{

    case Pending = "pending";
    case Adoptable = "adoptable";
    case Training = "training";
    case Quarantined = "quarantined";

    case PendingTransferred = "pendingTransferred";
    case PendingAdoption = "pendingAdoption";
    case MedicalHold = "medicalHold";
    case Lost = "lost";
}





