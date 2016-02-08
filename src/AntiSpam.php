<?php 

namespace Srph\LaravelAntiSpam;

use Exception;

class AntiSpam
{

    /**
     * The generated question
     *
     * @var string
     */
    protected $question = null;

    /**
     * Generates a hidden input containing the generated question
     */
    public function getQuestion() {
        return $this->generateQuestion();
    }

    /**
     * Generates a hidden input containing the generated question
     *
     * @return string
     */
    public function getInput() {
        $question = $this->generateQuestion();

        return "<input type='hidden' name='anti_spam_key' value='{$question}'>";
    }

    /**
     * Picks a random question from the given questions
     *
     * @return string
     */
    protected function generateQuestion() {
        if ( null !== $this->question ) {
            return $this->question;
        }

        $questions = array_keys($this->app->make('package::questions'));

        if ( !count($questions)) {
            throw new Exception('No question was listed in the configuration.');
        }

        return $this->question = $questions[rand(0, count($questions) - 1)];
    }
}