<?php

namespace App\Http\Traits;

trait ServiceRequestStages
{
    public function inReview()
    {
        return !$this->is_reviewed && !$this->is_review_accepted && is_null($this->review_action_date);
    }

    public function isReviewed()
    {
        return $this->is_reviewed && !is_null($this->review_action_date);
    }

    public function isReviewAccepted()
    {
        return $this->isReviewed() && $this->is_review_accepted && $this->serviceRequestReview()->exists();
    }

    public function isReviewRejected()
    {
        return $this->isReviewed() && !$this->is_review_accepted
            && !is_null($this->closed_date) && $this->serviceRequestReview()->exists();
    }

    public function inTech()
    {
        return $this->isReviewAccepted() && $this->is_sent_for_tech && !is_null($this->sent_for_tech_date);
    }

    public function isTechAccepted()
    {
//        dd($this->techEvaluation->media()->whereName('tech_evaluation_report')->exists());
        return $this->inTech() && $this->techEvaluation()->exists()
            && $this->techEvaluation->media()->whereName('tech_evaluation_report')->exists()
            && ($this->techEvaluation->improveRequests()->exists()
                || $this->techEvaluation->samples()->exists()
                || $this->techEvaluation->correctActionRequests()->exists());
    }

    public function isTechRejected()
    {
        return $this->inTech() && $this->techEvaluation()->exists()
            && $this->techEvaluation->media()->whereName('tech_evaluation_report')->exists()
            && ($this->techEvaluation->improveRequests()->count() === 0
                || $this->techEvaluation->samples()->count() === 0
                || $this->techEvaluation->correctActionRequests()->count() === 0)
            && !is_null($this->closed_date);
    }

    public function inTechReview()
    {
        return $this->isTechAccepted() && $this->is_sent_for_tech_review && !is_null($this->sent_for_tech_review_date);
    }

    public function isTechReviewAccepted()
    {
        return $this->inTechReview() && $this->is_tech_review_accepted
            && !is_null($this->tech_review_action_date) && $this->techEvaluationReview()->exists();
    }

    public function isTechReviewRejected()
    {
        return $this->inTechReview() && !$this->is_tech_review_accepted
            && !is_null($this->tech_review_action_date) && !is_null($this->closed_date)
            && $this->techEvaluationReview()->exists();
    }

    public function inFinalReview()
    {
        return $this->isTechReviewAccepted() && !is_null($this->sent_for_final_review_date);
    }

    public function isFinalReviewAccepted()
    {
        return $this->inFinalReview() && $this->is_final_review_accepted
            && !is_null($this->final_review_action_date) && $this->serviceRequestFinalReview()->exists();
    }

    public function isFinalReviewRejected()
    {
        return $this->inFinalReview() && !$this->is_final_review_accepted
            && !is_null($this->final_review_action_date) && !is_null($this->closed_date)
            && $this->serviceRequestFinalReview()->exists();
    }

    public function isCompleted()
    {
        return $this->isFinalReviewAccepted() && !is_null($this->closed_date);
    }

    public function isRejected()
    {
        return $this->isReviewRejected() || $this->isTechRejected() || $this->isTechReviewRejected() || $this->isFinalReviewRejected();
    }
}
